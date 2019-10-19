<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        
        $countries = Country::all();
        return view('user.products.checkout')
               ->withCountries($countries);
    }
}
