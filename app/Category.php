<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['name','description','url'];

    public function scopeOfParent($query, $type)
    {
        return $query->where('parent_id', $type);
    }
}
