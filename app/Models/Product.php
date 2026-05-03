<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'brand_id',
        'image'
    ];

    protected $casts = [
        'price' => 'float',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
        public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
