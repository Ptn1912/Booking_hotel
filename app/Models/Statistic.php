<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $table = 'statistical'; // Thiết lập tên bảng

    protected $primaryKey = 'statistical_id'; // Thiết lập khóa chính

    protected $fillable = [
        'order_date',
        'total_order',
        'profit',
    ];
}
