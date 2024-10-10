<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Personnel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $table = 'sales_agent';
    protected $primaryKey = 'id_personnel';
    protected $fillable = [
        'id_cccd',
        'name',
        'avatar',
        'email',
        'phone',
        'address',
        'province',
        'gender',
        'birthday',
        'status',
        'password',
    ];
}
