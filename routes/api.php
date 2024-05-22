<?php
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Feed\FeedController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Http\Request;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user', [AuthenticationController::class, 'user']);
    Route::post('update_account', [AccountController::class, 'UpdateAccount']);
    Route::get('/account', [CheckoutController::class, 'account'])->name('account');
}
);

Route::post('/post_blog', [BlogController::class, 'postBlog']);
Route::get('/show_blog', [BlogController::class, 'showBlog']);

Route::post('register',[AuthenticationController::class,'register']);
Route::post('login',[AuthenticationController::class,'login']);
Route::get('/book', [HotelController::class,'index']);
Route::post('/search/{name}', [HotelController::class, 'search']);
Route::get('/detail/{HotelID}', [HotelController::class, 'detail']);
Route::post('/payment', [CheckoutController::class, 'payment']);

// Route::get('user/{id}', [AccountController::class, 'showUser']);



// Route::group(['middleware' => ['auth:sanctum']], function() {

    //
    // Route::group(['prefix'=>'cart'],function(){
    //     Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    //     Route::get('/add_to_cart/{room_id}', [CartController::class, 'addToCart'])->name('add_to_cart');
    //     Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
    //     Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');
    //     Route::post('/session', [CartController::class, 'session'])->name('session');
    // });

    // Route::get('/book', [BookController::class, 'book'])->name('book');
    // Route::post('/search', [BookController::class, 'search'])->name('search');
    // Route::post('/searchajax', [BookController::class, 'suggestions'])->name('searchajax');
    // Route::get('/detail/{HotelID}', [BookController::class, 'detail'])->name('detail');
    // Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout'])->name('logout-checkout');
    // Route::get('/login-checkout', [CheckoutController::class, 'login_checkout'])->name('login-checkout');
    // Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
    // Route::get('/add-customer', [CheckoutController::class, 'viewregister'])->name('viewregister');
    // Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    // Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
    // Route::post('/momo_payment', [CheckoutController::class, 'momo_payment']);
    // Route::get('/account', [CheckoutController::class, 'account'])->name('account');


    // Route::post('/checkout_online', [CheckoutController::class, 'checkout_online'])->name('checkout_online');

    // Route::get('/contact', [ContactUsController::class, 'contact'])->name('contact-us');
    // Route::post('/contact', [ContactUsController::class, 'postContact']);
    // Route::get('/user', [AuthController::class, 'user']);
    // Route::put('/user', [AuthController::class, 'update']);
    // Route::post('/logout', [AuthController::class, 'logout']);

    // // Post
    // Route::get('/posts', [PostController::class, 'index']); // all posts
    // Route::post('/posts', [PostController::class, 'store']); // create post
    // Route::get('/posts/{id}', [PostController::class, 'show']); // get single post
    // Route::put('/posts/{id}', [PostController::class, 'update']); // update post
    // Route::delete('/posts/{id}', [PostController::class, 'destroy']); // delete post

    // // Comment
    // Route::get('/posts/{id}/comments', [CommentController::class, 'index']); // all comments of a post
    // Route::post('/posts/{id}/comments', [CommentController::class, 'store']); // create comment on a post
    // Route::put('/comments/{id}', [CommentController::class, 'update']); // update a comment
    // Route::delete('/comments/{id}', [CommentController::class, 'destroy']); // delete a comment

    // // Like
    // Route::post('/posts/{id}/likes', [LikeController::class, 'likeOrUnlike']); // like or dislike back a post
// });
