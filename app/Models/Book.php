<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey = 'book_id';
    protected $table = 'book';
    protected $fillable = [
        'reservate_id',
        'book_status',
        'book_code',
        // Các trường khác bạn muốn thêm vào đây
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservate::class, 'reservate_id', 'reservate_id');
    }
}
