<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $primaryKey = 'HotelID';
    protected $table = 'hotels';
    public $timestamps = true; // Sử dụng timestamps
    protected $fillable = [
        'name',
        'ImageHotel',
        'NumberOfRoom',
        'address',
        'status',
        // Các trường khác bạn muốn thêm vào đây
    ];
}
