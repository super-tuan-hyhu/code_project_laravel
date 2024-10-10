<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address_client';
    protected $primaryKey = 'id_address';
    protected $fillable = [
        'full_name',
        'phone',
        'city',
        'district',
        'wards',
        'specific_address',
        'is_default',
        'id_user',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_address');
    }
}
