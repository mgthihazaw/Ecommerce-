<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductAttribute;
use DB;

class ProductAttributeController extends Controller
{
    
    public function index(Product $product)
    {
        $productAttributes = $product->product_attributes;
        return view('admin.productAttributes.index')->withProduct($product)->withAttributes($productAttributes);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request,Product $product)
    {
        $request->validate([
            'sku.*' => 'required',
            'size.*' => 'required',
            'price.*' => 'required',
            'stock.*' => 'required'
        ]);
        
        DB::beginTransaction();
       try{
        foreach($request->size as $key => $value){

            //Check Duplicate SKU
            $countSKU =ProductAttribute::where('sku',$request['sku'][$key])->count();
            $countProductID =$product->product_attributes()->where('size',$request['size'][$key])->count();
            if($countSKU > 0){
                return redirect()->back()->with('error','SKU is Already exist');
            }
            if($countProductID > 0){
                return redirect()->back()->with('error','Your product Size is Already exits');
            }
            $product->product_attributes()->create([
                 'sku' => $request['sku'][$key],
                 'size' => $request['size'][$key],
                 'price' => $request['price'][$key],
                 'stock' => $request['stock'][$key]
            ]);
          DB::commit();
        }
       }catch(Exception $e){
        DB::rollBack();
        return redirect()->back()->with('error','Some Error Occur');
       }
       return redirect()->back()->with('success','Successfully Created');
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

    
    public function destroy(Product $product,ProductAttribute $productAttribute)
    {
        $productAttribute->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }
}
