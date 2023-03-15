<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_name',
        'category_id',
        'ragular_price',
        'price',
        'image',
        'short_desc',
        'desc',
        'policy',
        'status',

    ];
}
