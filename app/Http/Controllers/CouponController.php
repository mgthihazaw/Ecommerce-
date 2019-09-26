<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view('admin.coupons.create');
    }

    
    public function store(Request $request)
    {
        
        $this->validate(request(),[
           'coupon_code' => 'required',
           'amount'  => 'required',
           'amount_type' => 'required',
           'expiry_date' => 'required',
        ]);

        $date=date_create(request()->expiry_date);
         $datetime =date_format($date,"Y-m-d");
        
        
        Coupon::create([
            'coupon_code' => request()->coupon_code,
           'amount'  => request()->amount,
           'amount_type' => request()->amount_type,
           'expiry_date' => $datetime,
           'status'      => request()->status ? 1 : 0
        ]);
        return redirect()->back()->with('success','Coupoun is successfully created');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
