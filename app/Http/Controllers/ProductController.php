<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.products.index')->withProducts($products);

    }

    public function create()
    {
        $categories = Category::ofParent(0)->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();

            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--&nbsp;" . $sub_cat->name . "</option>";

            }
        }
        return view('admin.products.create')->withCategoriesDropdown($categories_dropdown);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $product = new Product();
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

                $product->image = $imageName;
            }

        }

        if(empty($request->status)){
            $product->status = 0;
        }else{
            $product->status = 1;
        }

        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->care = $request->care;
        $product->product_code = $request->product_code;
        $product->product_color = $request->product_color;
        $product->price = $request->price;

        $product->save();

        return redirect()->action('ProductController@index')->with('success', 'Successfully Created');
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
       
        $categories = Category::ofParent(0)->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            if($product->category_id == $cat->id) {
                $selected =  "selected" ;
            }else{
                $selected =" ";
            }
            $categories_dropdown .= "<option value='" . $cat->id . "' ".$selected
                                    .">" . $cat->name . "</option>";
             $sub_categories = Category::where(['parent_id' => $cat->id])->get();

            foreach ($sub_categories as $sub_cat) {
                if($product->category_id == $sub_cat->id) {
                    $selected =  "selected" ;
                }else{
                    $selected =" ";
                }
                $categories_dropdown .= "<option value='" . $sub_cat->id . "' ".$selected.">&nbsp;--&nbsp;" . $sub_cat->name . "</option>";
                

            }
        }
        return view('admin.products.edit')->withProduct($product)->withCategoriesDropdown($categories_dropdown);
    }

    public function update(Request $request, Product $product)
    {
        
        if ($request->hasFile('image')) {
            // $file_path = app_path().'/images/news/'.$news->photo;
            if(file_exists(public_path('images/backend/products/large/'.$product->image))){
                unlink(public_path('images/backend/products/large/'.$product->image));
            }
            if(file_exists(public_path('images/backend/products/medium/'.$product->image))){
                unlink(public_path('images/backend/products/medium/'.$product->image));
            }
            if(file_exists(public_path('images/backend/products/small/'.$product->image))){
                unlink(public_path('images/backend/products/small/'.$product->image)); 
            }
            
           
           
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

                $product->image = $imageName;
            }

        }

        if(empty($request->status)){
            $product->status = 0;
        }else{
            $product->status = 1;
        }

        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->care = $request->care;
        $product->product_code = $request->product_code;
        $product->product_color = $request->product_color;
        $product->price = $request->price;

        $product->save();

        return redirect()->action('ProductController@index')->with('success', 'Successfully Update');
    }

    public function destroy(Product $product)
    {
        if(file_exists(public_path('images/backend/products/large/'.$product->image))){
            unlink(public_path('images/backend/products/large/'.$product->image));
        }
        if(file_exists(public_path('images/backend/products/medium/'.$product->image))){
            unlink(public_path('images/backend/products/medium/'.$product->image));
        }
        if(file_exists(public_path('images/backend/products/small/'.$product->image))){
            unlink(public_path('images/backend/products/small/'.$product->image)); 
        }
        $product->delete();
        return redirect()->action('ProductController@index')->with('success', 'Product Successfully Delete');
    }
}
