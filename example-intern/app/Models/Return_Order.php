<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Return_Order extends Model
{
    use HasFactory;
        protected $table = 'return_order';
        protected $fillable  = [
            'order_id',
            'customer_id',
            'total_refund_amount',
            'refund_status',
            'reason',
        ];
}
