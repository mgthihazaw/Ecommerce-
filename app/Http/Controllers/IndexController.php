<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductAttribute;

class IndexController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','DESC')->get();
        $categories = Category::with('categories')->ofParent('0')->get();
        
        return view('user.home')->withProducts($products)->withCategories($categories);
    }
    public function products($url){
      
         $catCount = Category::where(['url' => $url,'status' => '1'])->count();
         if($catCount == 0){
           return view('user.404');
         }


        $categories = Category::with('categories')->ofParent('0')->get();

        $category = Category::where(['url' => $url])->first();

        $catArray =[];
        array_push($catArray,$category->id);
    
        if(count($category->categories) > 0){
          foreach($category->categories as $cat){
            array_push($catArray,$cat->id);
            
          }
        }
        
        
        $products =Product::whereIn('category_id',$catArray)->orderBy('id','DESC')->get();

        return view('user.products.listen')->withProducts($products)
                                           ->withCategories($categories)
                                           ->withCategoryDetail($category);
    
    }
    public function product($id = null){
     
      $productDetails =Product::with('product_attributes')->where('id',$id)->first();
      
     
      

      $categories = Category::with('categories')->ofParent('0')->get();
      
      return view('user.products.detail')
                    ->withProductDetails($productDetails)
                    ->withCategories($categories);

      
    }
   public function getSizeFromProduct($id){
    //  $product_attribute = ProductAttribute::where('id',$id)->first();
   }
}


