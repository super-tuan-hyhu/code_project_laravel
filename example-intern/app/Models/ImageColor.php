<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageColor extends Model
{
    use HasFactory;
    protected $table = 'image_color';
    protected $primaryKey = 'id_image';

    protected $fillable = [
        'id_color',
        'image_pro'
    ];
}
