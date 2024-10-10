<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = [
        'total_amount',
        'session_id',
        'user_id',
    ];

    public function cartDetail()
    {
        return $this->hasMany(CartDetail::class, 'cart_id');
    }

    public function cartUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
