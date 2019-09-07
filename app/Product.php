<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function product_attributes(){
        return $this->hasMany(ProductAttribute::class);
    }
    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }
}
