<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $fillable = [
        'image',
        'promotion',
        'name_voucher',
        'value',
        'conditionn',
        'date_start',
        'date_end',
    ];
}
