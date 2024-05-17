<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Reservate;
use App\Models\Book;
use App\Models\Book_Detail;
use Illuminate\Http\Request;
use Session;
class CheckoutController extends Controller
{
    public function payment(Request $request)
    {
        $data = $request->all();
        $reservate = new Reservate();
        $reservate->reservate_name = $data['reservate_name'];
        $reservate->reservate_email = $data['reservate_email'];
        $reservate->reservate_phone = $data['reservate_phone'];
        $reservate->reservate_address = $data['reservate_address'];
        $reservate->reservate_method = $data['reservate_method'];
        $reservate->save();
        $reservate_id = $reservate->reservate_id;
        // $reservate->total_momo = $data['total_momo'];
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        $book = new Book();
        $book->book_id = Session::get('book_id');
        $book->reservate_id = $reservate_id;
        $book->book_status = 1;
        $book->book_code = $checkout_code;
        $book->save();
                $bookdetails = new Book_Detail;
                $bookdetails->book_code = $checkout_code;
                $bookdetails->room_type = $data['room_type'];
                $bookdetails->room_price = $data['room_price'];
                $bookdetails->quantity = $data['quantity'];
                $bookdetails->save();
        // Mail::to($reservate->reservate_email)->send(new ConfirmationEmail($reservate, $book, $bookdetails));
        return response()->json([
            'reservate' => $reservate,
            'book' => $book,
            'bookdetails'=>$bookdetails
        ], 201);
    }
}
