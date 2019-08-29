<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    protected $fillable =['name','description','url'];

    public function scopeOfParent($query, $type)
    {
        return $query->where('parent_id', $type);
    }
    public function categories(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    

}
