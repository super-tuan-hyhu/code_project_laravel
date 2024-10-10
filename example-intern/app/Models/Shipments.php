<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    use HasFactory;
    protected $table = "shipments";
    protected $primaryKey = "id_driver";
    protected $fillable = [
        'shipments_1',
        'shipments_2',
        'shipments_3',
        'shipments_4',
        'shipments_5',
        'shipments_6',
        'shipments_7',
        'cancel_8',
        'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
