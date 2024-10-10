<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Return_Order_Detail extends Model
{
    use HasFactory;
    protected $table = "return_order_detail";
    protected $primaryKey = "id_return";
    protected $fillable = [
        'return_order_id',
        'product_id',
        'size',
        'color',
        'refund_amount',
        'quantity',
        'id_category',
        'id_brand',
    ];
}
