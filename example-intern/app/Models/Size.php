<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $primaryKey = 'id_size';

    protected $fillable = [
        'name_size',
        'id_product',
    ];
}
