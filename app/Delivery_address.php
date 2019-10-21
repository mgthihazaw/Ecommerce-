<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_address extends Model
{
    protected $table='deliver_address';
    protected $fillable = [
        'name', 'user_email', 'user_id','address','city','state','country','pincode','mobile'
    ];
}
