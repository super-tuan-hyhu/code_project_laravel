<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'image',
        'price',
        'discount',
        'sku',
        'tag',
        'barcode',
        'quantity',
        'id_category',
        'id_brand',
        'description',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }

    public function color()
    {
        return $this->hasMany(Color::class, 'id_product');
    }

    public function size()
    {
        return $this->hasMany(Size::class, 'id_product');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }
}
