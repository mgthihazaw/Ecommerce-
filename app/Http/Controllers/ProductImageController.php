<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $product_images =$product->product_images;
        return view('admin.productImages.create')
                   ->withProductImages($product_images)
                   ->withProduct($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product,Request $request)
    {
        if ($request->hasFile('image')) {
            
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $imageName = time() . '.' . $extension;

                $large_image_path = 'images/backend/products/large/' . $imageName;
                $medium_image_path = 'images/backend/products/medium/' . $imageName;
                $small_image_path = 'images/backend/products/small/' . $imageName;

                Image::make($image_tmp)->resize(1200, 1200,function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($large_image_path));
                Image::make($image_tmp)->resize(600, 600,function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($medium_image_path));
                Image::make($image_tmp)->resize(300, 300,function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($small_image_path));

               
            }

            // $product->image = $imageName;
            $product->product_images()->create([
                'image' => $imageName
            ]);
             return redirect()->back()->with('success', 'Successfully image upload');
       


        }

               
        
       
        
         
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
