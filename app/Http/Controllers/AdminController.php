<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\Models\Invoice;
use App\Models\Room;
use Auth;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
   public function adminlogin() {
    return view('admin.adminlogin');
   }

   public function adminlogout()
   {
       Auth::logout();
       return redirect()->route('login');
   }
   public function dashboard(){
    return view('dashboard.home');
  }
   public function admin_dashboard(Request $request){
     $userEmail = $request->userEmail;
     $userPassword = $request->userPassword;
     $result = DB::table('users')->where('email', $userEmail)->where('password', $userPassword)->where('role', 1)->first();
     if ($result) {
        // Kiểm tra xem thuộc tính 'name' tồn tại trong đối tượng $result hay không
        if (isset($result->name)) {
            // Thiết lập các session và chuyển hướng
            Session::put('username', $result->name);
            Session::put('userID', $result->id);

            // Các thao tác khác
            $totalOrderSum = Statistic::sum('total_order');
            $totalHotel = Hotel::count();
            $totalRoomAvai = Room::where('room_status', 1)->count();
            $totalProfit = Statistic::sum('profit');

            return view('dashboard.home', compact('totalOrderSum', 'totalHotel', 'totalRoomAvai', 'totalProfit'));
        } else {
            // Nếu thuộc tính 'name' không tồn tại trong đối tượng $result
            Session::put('error', 'Invalid credentials or you do not have access rights');
        }
    } else {
        Session::put('error', 'Invalid credentials or you do not have access rights');
    }

    // Nếu không có kết quả hoặc không có thuộc tính 'name', chuyển hướng về trang đăng nhập
    return Redirect::to('/dashboard');

}
   public function logout(){
    Session::put('username', null);
      Session::put('userID', null);
      return Redirect::to('/dashboard');
   }
   public function respon(){
    return view('layouts.master');
   }
   public function profile(){
    return view('profile');
  }
  public function admin_login(){
    return view('admin_login');
  }
  public function load_dashboard(){
    $totalOrderSum = Statistic::sum('total_order');
    $totalHotel = Hotel::count();
    $totalRoomAvai = Room::where('room_status', 1)->count();
    $totalProfit = Statistic::sum('profit');
    return view('dashboard.home', compact('totalOrderSum', 'totalHotel', 'totalRoomAvai', 'totalProfit'));
}
  public function allHotels(){
    return view('hotels.allhotel');
}
public function addHotels(){
    return view('hotels.addhotel');
}
public function editHotels(){
  return view('hotels.edithotel');
}
public function calendar(){
  return view('calendar');
}
}

