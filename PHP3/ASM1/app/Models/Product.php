<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'price',
        'sale_price',
        'thumbnail',
        'status',
        'category_id',
    ];

    protected $attributes = [
        'price' => 0,
        'sale_price' => 0,
    ];

    protected $casts = [
        'price' => 'double',
        'sale_price' => 'double',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $timestamps = true;
}
