<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $primaryKey = 'id_order';

    protected $fillable = [
        'accepted',
        'email',
        'address',
        'phone',
        'payment_methods',
        'country',
        'order_address',
        'zip',
        'status',
        'account',
        'coupon',
        'message',
        'barCode',
        'shippingDelivery',
        'total',
    ];

    public function accountCoupon()
    {
        return $this->belongsTo(User::class, 'account');
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function shipment()
    {
        return $this->hasOne(Shipments::class, 'order_id');
    }
}
