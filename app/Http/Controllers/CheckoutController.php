<?php

namespace App\Http\Controllers;

use App\Country;
use App\Delivery_address;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request){
        $user = auth()->user();

        $shippingCount  = Delivery_address::where('user_id',$user->id)->count();
        $shippingDetail = [];
        if($shippingCount>0){
            $shippingDetail = Delivery_address::where('user_id',$user->id)->first();
        }

        if($request->isMethod('post')){
            $request->validate([
               'billing_name' => 'required',
               'billing_address' => 'required',
               'billing_city' => 'required',
               'billing_state' => 'required',
               'billing_country' => 'required',
               'billing_pincode' => 'required',
               'billing_mobile' => 'required',
               'shipping_name' => 'required',
               'shipping_address' => 'required',
               'shipping_city' => 'required',
               'shipping_state' => 'required',
               'shipping_country' => 'required',
               'shipping_pincode' => 'required',
               'shipping_mobile' => 'required',
            ]);

            $user->update([
                'name' => $request->billing_name,
                'address' => $request->billing_address,
                'city' => $request->billing_city,
                'state' => $request->billing_state,
                'country' => $request->billing_country,
                'pincode' => $request->billing_pincode,
                'mobile' => $request->billing_mobile
            ]);

            if($shippingCount > 0){
                $shippingDetail->update([
                    'name' => $request->shipping_name,
                    'address' => $request->shipping_address,
                    'city' => $request->shipping_city,
                    'state' => $request->shipping_state,
                    'country' => $request->shipping_country,
                    'pincode' => $request->shipping_pincode,
                    'mobile' => $request->shipping_mobile
                ]);
            }else{
                Delivery_address::create([
                    'user_id' => $user->id,
                    'user_email' =>$user->email,
                    'name' => $request->billing_name,
                    'address' => $request->billing_address,
                    'city' => $request->billing_city,
                    'state' => $request->billing_state,
                    'country' => $request->billing_country,
                    'pincode' => $request->billing_pincode,
                    'mobile' => $request->billing_mobile

                ]);
            }
            
            return redirect()->back();
        }

        
        $countries = Country::all();
        return view('user.products.checkout')
               ->withCountries($countries)
               ->withUser($user)
               ->withShippingDetail($shippingDetail);
    }
}
