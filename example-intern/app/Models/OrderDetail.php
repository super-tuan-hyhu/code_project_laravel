<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "order_detail";
    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'product_id',
        'order_id',
        'name_product',
        'price_product',
        'color',
        'size',
        'sku',
        'id_category',
        'id_brand',
        'sku',
        'number_product',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }
}
