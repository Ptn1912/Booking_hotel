<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice'; // Thiết lập tên bảng

    protected $primaryKey = 'invoice_id'; // Thiết lập khóa chính

    protected $fillable = [
        'bookingdetails_id',
        'total',

    ];

    // Định nghĩa quan hệ với bảng bookingdetails
    public function bookingDetail()
    {
        return $this->belongsTo(Book_Detail::class, 'book_details_id', 'book_code');
    }
    public function calculateTotalAmount()
    {
        $bookingDetails = Book_Detail::find($this->book_details_id);

        if ($bookingDetails) {
            $quantity = $bookingDetails->quantity;
            $roomPrice = $bookingDetails->room->room_price;

            return $quantity * $roomPrice;
        }

        return null;
    }
}
