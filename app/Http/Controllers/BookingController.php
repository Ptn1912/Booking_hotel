<?php

namespace App\Http\Controllers;

use App\Models\Book_Detail;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Statistic;
use App\Models\Book;
use App\Models\Invoice;
use App\Models\Room;
use App\Models\Reservate;
use App\Models\User;
use Session;
use Carbon\Carbon;
use Log;
use PDF;
use Illuminate\Support\Facades\Redirect;
session_start();

class BookingController extends Controller
{
    public function print_order($invoice_id){
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($this->print_order_convert($invoice_id));
         return $pdf->stream();
    }
    public function print_order_convert($invoice_id){

        $invoices = Invoice::with('bookingDetail')->get();
        foreach ($invoices as $invoice) {

            $checkoutDate = Carbon::parse($invoice->bookingDetail->created_at)->addDays($invoice->bookingDetail->quantity)->format('Y-m-d');
            $invoice->checkout_date = $checkoutDate;

            $total = $invoice->bookingDetail->quantity * $invoice->bookingDetail->room->room_price;
                $invoice->total = $total;
        }
        $invoice = Invoice::where('invoice_id', $invoice_id)->first();
        $checkoutDate = Carbon::parse($invoice->bookingDetail->created_at)->addDays($invoice->bookingDetail->quantity)->format('Y-m-d');
        $invoice->checkout_date = $checkoutDate;

        $total = $invoice->bookingDetail->quantity * $invoice->bookingDetail->room->room_price;
            $invoice->total = $total;
        $output = '';
        $output.= '
        <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: DejaVu Sans;
            font-size: 15px;
        }

        .invoice-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 650px;
            margin-top: 20px;
            margin-bottom: 20px;
            border-collapse: collapse;
            text-align: center;
            justify-content: center;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;

        }
        .table td:first-child {
            text-align: left; /* Căn lề trái cho cột đầu tiên */
        }

        .table td:last-child {
            text-align: left; /* Căn lề phải cho cột cuối cùng */
        }

    </style>
    <div class="invoice-title">
    <h2 style="text-align:center">Invoice</h2>
    <h2 style="text-align:center">Order # '.$invoice->invoice_id.'</h2>
</div>
<hr>
        <table class="table" border="1">
        <tbody>';

    $output.= '
         <tr>
         <td colspan="2"><b>Book Code: </b></td>
         <td>'.$invoice->bookingDetail->book_code.'</td>
         </tr>
          <tr">
            <td><b>Client: </b></td>
            <td style="text-align:center"><b>Name: </b>'.$invoice->bookingDetail->booking->reservation->reservate_name.'</td>
            <td><b>Phone: </b>'.$invoice->bookingDetail->booking->reservation->reservate_phone.' <br>
            <b>Address: </b>'.$invoice->bookingDetail->booking->reservation->reservate_address.'
            </td>
          </tr>
          </tr>
          <tr">
            <td><b>Booking: </b></td>
            <td><b>Checkin date: </b>'.$invoice->bookingDetail->created_at.' <br>

               <b>Checkout date: </b>'.$invoice->checkout_date.'</td>

            <td><b>Quantity: </b>'.$invoice->bookingDetail->quantity.'</td>
          </tr>
          <tr">
            <td><b>Room: </b></td>
            <td><b>Hotel: </b>'.$invoice->bookingDetail->room->hotel->name.'</td>
            <td><b>Room Type: </b>'.$invoice->bookingDetail->room->room_type.' <br>
            <b>Room Number: </b>'.$invoice->bookingDetail->room->room_no.' <br>
            <b>Room Price: </b>'.$invoice->bookingDetail->room->room_price.' <b>VNĐ</b> <br>

               </td>
          </tr>
          <tr">
          <td colspan="2"><b>State: </b> paid the bill</td>
          <td><b>Total: </b>'.$invoice->total.' <b>VNĐ</b>

             </td>
        </tr>
        ';
          $output.= '
        </tbody>
      </table>
        ';
        return $output;
    }
    public function allbooking(){
        $booking = Book_Detail::with('booking', 'room')->get();
        $statisticData = [];

        foreach ($booking as $record) {
            $checkoutDate = Carbon::parse($record->created_at)->addDays($record->quantity)->format('Y-m-d');
            $record->checkout_date = $checkoutDate;
            $total = $record->quantity * $record->room_price;
            if ($record) {
                $invoice = Invoice::updateOrCreate(
                    ['bookingdetails_id' => $record->book_details_id],
                    ['bookingdetails_id' => $record->book_details_id,
                    'total' => $total]
                );
                $statisticData[] = [
                    'date' => $record->created_at->format('Y-m-d'),
                    'total_order' => 1,
                    'profit' => $total,
                ];
            }
        }
        $statisticSummary = collect($statisticData)->groupBy('date')->map(function ($item) {
            return [
                'total_order' => $item->sum('total_order'),
                'profit' => $item->sum('profit'),
            ];
        });

        foreach ($statisticSummary as $date => $summary) {
            Statistic::updateOrCreate(
                ['order_date' => $date],
                [
                    'total_order' => $summary['total_order'],
                    'profit' => $summary['profit'],
                ]
            );
        }

        $invoices = Invoice::with('bookingDetail')->get();
        foreach ($invoices as $invoice) {
            // Kiểm tra nếu bookingDetail tồn tại trước khi thực hiện thao tác
            if ($invoice->bookingDetail) {
                $checkoutDate = Carbon::parse($invoice->bookingDetail->created_at)->addDays($invoice->bookingDetail->quantity)->format('Y-m-d');
                $invoice->checkout_date = $checkoutDate;

                $total = $invoice->bookingDetail->quantity * $invoice->bookingDetail->room->room_price;
                $invoice->total = $total;
            }
        }

        return view('formbooking.allbooking', compact('booking', 'invoices'));
    }

    public function booking_confirmed($book_details_id){
        DB::table('book_details')->where('book_details_id',$book_details_id)->update(['payment_confirmed'=>1]);
        $bookingDetail = Book_Detail::find($book_details_id);
        if ($bookingDetail) {
            $bookingDetail->room->update(['room_status' => 3]);
        }
        Session::flash('success', 'Confirm seccessfully');
        return Redirect::to('/add-booking');
     }
     public function updateRoomStatus()
{
    $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
    $bookingDetails = Book_Detail::with('rooms')->where('payment_confirmed', 1)->get();

    foreach ($bookingDetails as $bookingDetail) {
        $checkoutDate = Carbon::parse($bookingDetail->created_at)->addDays($bookingDetail->quantity)->format('Y-m-d');

        if ($checkoutDate < $today) {

            $bookingDetail->room->update(['room_status' => 1]);
        } else {

            $bookingDetail->room->update(['room_status' => 3]);
        }
    }
}
     public function booking_notconfirmed($book_details_id){
        $booking = DB::table('book_details')->where('book_details_id', $book_details_id)->first();
        if($booking && $booking->payment_confirmed == 0) {
            DB::table('book_details')->where('book_details_id', $book_details_id)->delete();
            Session::flash('success', 'Booking not confirmed and deleted successfully');
        } else {
            Session::flash('error', 'Unable to delete or booking is already confirmed');
        }

        return redirect()->to('/add-booking');
     }
     public function getBookingInfo($user_id) {
        $users = User::find($user_id);

        if ($users) {
            $data = [
                'username' => $users->name,
                'useremail' => $users->email,
            ];
            return response()->json($data);
        } else {
            return response()->json(['error' => 'Không tìm thấy thông tin người dùng'], 404);
        }
    }
    public function confirmBooking()
{
    // Lấy danh sách các đơn đặt hàng thỏa điều kiện
    $bookingsToConfirm = Book::where('book_status', 1)
        ->where('booking_confirmed', 0)
        ->get();

    // Trả về view 'formbooking.confirmbooking' kèm theo dữ liệu $bookingsToConfirm
    return view('formbooking.confirmbooking', compact('bookingsToConfirm'));
}
    public function updateSelectedHotel(Request $request)
{
    $selectedHotel = $request->input('selectedHotel');

    session(['selectedHotel' => $selectedHotel]);

    return response()->json(['success' => true]);
}
    public function getAll_Infor_Booking()
    {
        $bookingsToConfirm = Reservate::with('room', 'booking')->where('payment_confirmed', 0)
        ->get();
        foreach ($bookingsToConfirm as $record) {
            $checkoutDate = Carbon::parse($record->created_at)->addDays($record->quantity)->format('Y-m-d');
            $record->checkout_date = $checkoutDate; // Thêm thông tin checkout vào thuộc tính checkout_date
        }

        return view('formbooking.confirmbooking', compact('bookingsToConfirm'));
    }
    public function getRoomTypes(Request $request)
{
    $hotelName = $request->input('hotelName');

    $roomTypes = Room::join('products', 'room.HotelID', '=', 'products.HotelID')
        ->where('products.name', $hotelName)
        ->pluck('room.room_type');

    return response()->json($roomTypes);
}

public function confirmBookingAction(Request $request)
{
    $bookId = $request->input('book_id');

    $booking = Book::find($bookId);

    if ($booking) {

        $booking->booking_confirmed = 1;

        $booking->save();

        return redirect()->route('confirm-booking')->with('success', 'Booking confirmed successfully');
    }

    return redirect()->route('confirm-booking')->with('error', 'Booking confirmation failed');
}

public function deleteInvoice(Request $request){
    try {
        $invoiceid = $request->invoice_id;

        // Update payment_confirmed field in BookingDetails to 3 (Assuming 3 means cancelled)
        $bookingDetail = Invoice::find($invoiceid)->bookingDetail;
        if ($bookingDetail) {
            $bookingDetail->payment_confirmed = 3; // Assuming 3 indicates cancellation
            $bookingDetail->save();
        }

        // Attempt to delete the Invoice
        $deleted = Invoice::destroy($invoiceid);

        if ($deleted) {
            Session::flash('success', 'Deleted successfully');
        } else {
            Session::flash('error', 'Không thể xóa phòng. Vui lòng thử lại sau.');
        }

        return redirect()->back();
    } catch(\Exception $e) {
        Session::flash('error', 'Xóa thất bại: ' . $e->getMessage());
        return redirect()->back();
    }
}
public function searchBooking(Request $request)
{
    $keyword = $request->input('keyword');

    $invoices = Invoice::whereHas('bookingDetail.booking.reservation', function ($query) use ($keyword) {
        $query->where('reservate_name', 'like', '%' . $keyword . '%');
    })->get();

    return view('formbooking.allbooking', ['invoices' => $invoices]);
}
//     public function getRoomTypes(Request $request)
// {
//     $hotelName = $request->input('hotelName');


//     $roomTypes = Room::where('hotel_name', $hotelName)->pluck('room_type');

//     return response()->json($roomTypes);
// }
    //  public function saveBooking(Request $request){
    //     $userData = $request->only(['name', 'email']); // Dữ liệu cho bảng users
    //     $profileData = $request->only(['age', 'gender']); // Dữ liệu cho bảng profiles
    //     $addressData = $request->only(['street', 'city', 'country']); // Dữ liệu cho bảng addresses

    //     // Tạo một transaction để đảm bảo tính toàn vẹn dữ liệu
    //     DB::transaction(function () use ($userData, $profileData, $addressData) {
    //         // Tạo và lưu thông tin người dùng vào bảng users
    //         $user = User::create($userData);

    //         // Gán user_id vào profile data
    //         $profileData['user_id'] = $user->id;

    //         // Tạo và lưu thông tin profile vào bảng profiles
    //         $profile = Profile::create($profileData);

    //         // Gán user_id vào address data
    //         $addressData['user_id'] = $user->id;

    //         // Tạo và lưu thông tin địa chỉ vào bảng addresses
    //         $address = Address::create($addressData);
    //     });

    //     // Redirect hoặc thực hiện hành động khác sau khi lưu thành công
    //     return redirect()->route('users.index')->with('success', 'Data has been saved successfully!');
    // }
     }
