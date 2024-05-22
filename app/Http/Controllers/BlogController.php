<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Blog;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function showBlog()
    {
        $blogs = Blog::take(9)->get();
        $blogsWithUsernames = $blogs->map(function ($blog) {
            $blog->username = $blog->user->username; // Assuming the Blog model has a user relationship
            return $blog;
        });
        return response()->json($blogsWithUsernames, 200);
    }

    public function postBlog(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'username'=>'required|string|max:255',
            'review' => 'required|string|max:255', // Kiểm tra nội dung đánh giá
            'userid' => 'required|exists:users,id', // Kiểm tra user id có tồn tại không
            // Các trường khác bạn muốn kiểm tra
        ]);

        // Lưu ảnh vào thư mục trên máy chủ
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $imageUrl = $imageName;

        // Tạo bài đăng mới trong cơ sở dữ liệu
        $blog = new Blog();
        $blog->image = $imageUrl;
        $blog->review = $validatedData['review'];
        $blog->username = $validatedData['username'];
        $blog->userid = $validatedData['userid'];
        // Các trường khác bạn muốn thêm vào đây

        $blog->save();

        return response()->json(['message' => 'Bài viết đã được đăng thành công'], 200);
    }

}
