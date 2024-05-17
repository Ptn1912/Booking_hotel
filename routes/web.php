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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// // -----------------------------Admin----------------------------------------//
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
Route::get('/admin-dashboard', [AdminController::class, 'load_dashboard'])->name('Load_dashboard');
Route::get('/calendar', [AdminController::class, 'calendar'])->name('calendar');
Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

// -----------------------------Dashboard----------------------------------------//
Route::get('/update-room-status', [BookingController::class, 'updateRoomStatus']);
Route::get('/get-infStatistic', [DashboardAdminController::class, 'infor_statistic']);
Route::get('/infStatistic', [DashboardAdminController::class, 'statistic']);
Route::post('/filter-by-date', [DashboardAdminController::class, 'filter_by_date']);
Route::post('/dashboard-filter', [DashboardAdminController::class, 'dashboard_filter']);
Route::post('/days-order', [DashboardAdminController::class, 'days_order']);

// -----------------------------login----------------------------------------//
Route::get('/', [AdminController::class, 'admin_login'])->name('login');
Route::get('/adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');

// ------------------------------ register ---------------------------------//
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);

// // ----------------------------- Hotels -----------------------------//
Route::get('/add-hotel', [AdminController::class, 'addHotels'])->name('Add-Hotels');
Route::get('/all-hotel', [HotelController::class, 'getAllHotels'])->name('All-Hotels');
Route::get('/edit-hotel/{HotelID}', [HotelController::class, 'updateHotels'])->name('Edit-Hotels');

Route::post('/save-Hotel', [HotelController::class, 'saveHotels'])->name('Save-Hotels');
Route::post('/updated-Hotel', [HotelController::class, 'updatedHotels'])->name('Updated-Hotels');
Route::post('/delete-hotel', [HotelController::class, 'deleteHotels'])->name('Delete-Hotels');
Route::post('/update-number-of-rooms', [HotelController::class, 'updateNumberOfRooms']);


// ----------------------------- booking -----------------------------//
Route::get('/all-booking', [BookingController::class, 'allbooking'])->name('form/allbooking');
Route::get('form/booking/edit/{bkg_id}', [BookingController::class, 'bookingEdit']);
Route::get('/add-booking', [BookingController::class, 'getAll_Infor_Booking'])->name('form/booking/add');
Route::get('/get-booking-info/{user_id}', [BookingController::class, 'getBookingInfo'])->name('get-booking-info');
Route::get('/print-order/{invoice_id}', [BookingController::class, 'print_order'])->name('print/order');

Route::get('/admin/confirm-booking', [BookingController::class, 'confirmBooking'])->name('confirm-booking');
Route::post('/admin/confirm-booking-action', [BookingController::class, 'confirmBookingAction'])->name('confirm-booking-action');

// Route::get('/all-Users', [BookController::class, 'getAllUsers'])->name('All-Users');
Route::get('/booking-confirmed/{book_details_id}', [BookingController::class, 'booking_confirmed']);
Route::get('/booking-not-confirmed/{book_details_id}', [BookingController::class, 'booking_notconfirmed']);
Route::get('/get-room-types',  [BookingController::class, 'getRoomTypes'])->name('getRoomTypes');

Route::post('/updateSelectedHotel', [BookingController::class, 'updateSelectedHotel']);
Route::post('form/booking/save', [BookingController::class, 'saveBooking'])->name('form/booking/save');
// Route::post('form/booking/delete', [App\Http\Controllers\BookingController::class, 'deleteRecord'])->middleware('auth')->name('form/booking/delete');

// ----------------------------- Account-Users -----------------------------//
Route::get('/add-users', [AccountController::class, 'addUsers'])->name('Add-Users');
Route::get('/all-users', [AccountController::class, 'allUsers'])->name('form/allusers');
Route::get('/edit-users/{id}', [AccountController::class, 'updateUsers'])->name('Edit-Users');
Route::delete('/delete-user/{id}', [AccountController::class, 'deleteUser']);

Route::post('save-users', [AccountController::class, 'saveUsers'])->name('form/addcustomer/save');
Route::post('/updated-users', [AccountController::class, 'updatedUsers'])->name('Updated-Users');
Route::post('/updateUserRole/{id}', [AccountController::class, 'updateUserRole'])->name('update/role');

Route::get('/all-Invoices', [AccountController::class, 'allinvoices'])->name('form/allinvoices');
Route::get('/all-blog', [AccountController::class, 'All_blog'])->name('form/blog');
Route::delete('/delete-blog/{id}', [AccountController::class, 'deleteBlog']);

Route::get('form/customer/edit/{bkg_customer_id}', [AccountController::class, 'updateCustomer']);
// Route::post('form/customer/update', [App\Http\Controllers\CustomerController::class, 'updateRecord'])->middleware('auth')->name('form/customer/update');
// Route::post('form/customer/delete', [App\Http\Controllers\CustomerController::class, 'deleteRecord'])->middleware('auth')->name('form/customer/delete');

// // ----------------------------- rooms -----------------------------//
Route::get('/add-room', [RoomController::class, 'addRooms'])->name('form/addroom/page');
Route::get('/get-hotel-info/{hotelID}', [RoomController::class, 'getHotelInfo'])->name('get-hotel-info');
Route::get('/all-room', [RoomController::class, 'getAllRooms'])->name('form/allrooms/page');
Route::get('/edit-room/{room_id}', [RoomController::class, 'updateRooms'])->name('Edit-Room');
Route::get('/active/{roomID}', [RoomController::class, 'room_status_active']);
Route::get('/inactive/{rooID}', [RoomController::class, 'room_status_inactive']);
Route::post('/save-room', [RoomController::class, 'saveRooms'])->name('form/room/save');
Route::post('form/room/delete', [RoomController::class, 'deleteRooms'])->name('form/room/delete');
Route::post('form/room/update', [RoomController::class, 'updatedRooms'])->name('form/room/update');
Route::get('/search-booking', [BookingController::class, 'searchBooking'])->name('booking/search');
Route::get('/search-user', [AccountController::class, 'searchUser'])->name('user/search');
Route::get('/search', [RoomController::class, 'search'])->name('room/search');

Route::post('/delete-invoice', [BookingController::class, 'deleteInvoice'])->name('Delete/Invoice');

?>
