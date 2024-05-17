<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Book_Detail extends Model
{
    use HasFactory;
    protected $primaryKey = 'book_details_id';
    protected $table = 'book_details';

        protected $fillable = [
            'book_code',
            'room_type',
            'room_price',
            'quantity',
            'payment_confirmed',

            // Các trường khác bạn muốn thêm vào đây
        ];

        public function booking() {
            return $this->belongsTo(Book::class, 'book_code', 'book_code');
        }
        public function room()
        {
            return $this->belongsTo(Room::class, 'room_id', 'room_id');
        }
        public function checkoutDate()
        {
            $checkoutDate = Carbon::parse($this->created_at)->addDays($this->quantity);
            return $checkoutDate->format('Y-m-d'); // Định dạng ngày ra theo ý muốn của bạn
        }
}
