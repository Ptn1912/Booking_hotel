<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservate extends Model
{
    use HasFactory;
    protected $primaryKey = 'reservate_id';
    protected $table = 'reservate';

    protected $fillable = [
        'reservate_name',
        'reservate_address',
        'reservate_phone',
        'reservate_email',
        'reservate_method',
        'userid',
        // Các trường khác bạn muốn thêm vào đây
    ];
    public function user() {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
}
