<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Reservate;
use App\Models\Book;
use App\Models\Book_Detail;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
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
        $reservate->userid = $data['userid'];
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
    public function account(Request $request)
{
    // Retrieve the authenticated user
    $user = Auth::user();
    if (!$user) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    // Log the authenticated user's information
    \Log::info('User: ' . json_encode($user));

    // Get reservation IDs for the authenticated user
    $userReservateIds = Reservate::where('userid', $user->id)->pluck('reservate_id')->toArray();

    // Log the reservation IDs associated with the user
    \Log::info('User Reservate IDs: ' . json_encode($userReservateIds));

    // Check if the user exists and has reservations
    if ($user && !empty($userReservateIds)) {
        // Retrieve books with reservate_ids that match the user's reservation IDs
        $books = Book::whereIn('reservate_id', $userReservateIds)->get();

        // Log the retrieved books
        \Log::info('Books: ' . json_encode($books));

        // Check if there are any books retrieved
        if ($books->isNotEmpty()) {
            // Extract book codes from the retrieved books
            $bookCodes = $books->pluck('book_code')->toArray();

            // Retrieve booking details that match the book codes
            $bookingDetails = Book_Detail::whereIn('book_code', $bookCodes)->get();

            // Log the booking details
            \Log::info('Booking Details: ' . json_encode($bookingDetails));

            // Return a JSON response with the booking details and user information
            return response()->json([
                'bookingDetails' => $bookingDetails,
                'user' => $user
            ], 200);
        }
    }

    // Return a JSON response with an error if no user or reservations found
    return response()->json(['error' => 'User not found or no reservations'], 404);
}


}
