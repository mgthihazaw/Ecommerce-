<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Coupon;
use App\ProductAttribute;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
  public function index()
  {
    $products = Product::orderBy('id', 'DESC')->where('status', 1)->get();
    $categories = Category::with('categories')->ofParent('0')->get();
    
    return view('user.home')->withProducts($products)->withCategories($categories);
  }
  public function products($url)
  {

    $catCount = Category::where(['url' => $url, 'status' => '1'])->count();
    if ($catCount == 0) {
      return view('user.404');
    }


    $categories = Category::with('categories')->ofParent('0')->get();

    $category = Category::where(['url' => $url])->first();

    $catArray = [];
    array_push($catArray, $category->id);

    if (count($category->categories) > 0) {
      foreach ($category->categories as $cat) {
        array_push($catArray, $cat->id);
      }
    }


    $products = Product::whereIn('category_id', $catArray)->where('status', 1)->orderBy('id', 'DESC')->get();



    return view('user.products.listen')->withProducts($products)
      ->withCategories($categories)
      ->withCategoryDetail($category);
  }
  public function product($id = null)
  {

    $productDetails = Product::with('product_attributes')->where('id', $id)->where('status', 1)->firstOrFail();

    $relatedProducts = Product::where('id', "!=", $id)->where('category_id', $productDetails->category_id)->get();
    $relatedProducts = array_chunk($relatedProducts->toArray(), 3);
    // dd($relatedProducts);

    $total_stock = ProductAttribute::where('product_id', $id)->sum('stock');

    $categories = Category::with('categories')->ofParent('0')->get();
   

    return view('user.products.detail')
      ->withProductDetails($productDetails)
      ->withCategories($categories)
      ->withTotalStock($total_stock)
      ->withRelatedProducts($relatedProducts);
  }
  public function getSizeFromProduct($id)
  {
    //  $product_attribute = ProductAttribute::where('id',$id)->first();
  }

  public function addToCart(Request $request)
  {
    Session::forget('CouponAmount');
    Session::forget('CouponCode');


    $this->validate($request, [
      'product_id' =>  'required',
      'product_name' =>  'required',
      'product_code' =>  'required',
      'product_color' => 'required',
      'size' =>  'required|string',
      'price' =>  'required',
      'quantity' =>  'required|min:1',
    ]);

    if (empty($request->email)) {
      $request->email = "";
    }
    $session_id = Session::get('session_id');
    if (empty($session_id)) {
      $session_id = str_random(40);
      Session::put('session_id', $session_id);
    }


    Cart::updateOrCreate([
      'product_id' => $request->product_id,
      'product_name' => $request->product_name,
      'product_code' => $request->product_code,
      'product_color' => $request->product_color,
      'user_email' => $request->email,
      'size' => $request->size,
    ], [
      'price' => $request->price,
      'quantity' => $request->quantity,
      'session_id' => $session_id,
    ]);

    return redirect()->back()->with('success', 'Cart is successfully saved');
  }

  public function showCart()
  {

    $session_id = Session::get('session_id');
    $carts = Cart::where(['session_id' => $session_id])->get();
    return view('user.products.cart')->withCarts($carts);
  }

  public function removeCart($id)
  {
    Session::forget('CouponAmount');
    Session::forget('CouponCode');

    $cartItem = Cart::find($id);
    $cartItem->delete();

    return redirect()->back()->with('success', 'Item is successfully deleted');
  }

  public function increaseCart($id)
  {
    
    Session::forget('CouponAmount');
    Session::forget('CouponCode');

      $cart = Cart::where('id', $id)->first();
      // dd($cart->product_code);
      $attribute_stock = ProductAttribute::where('sku','LIKE','AD10008%')->first();
      

      if((int)$cart->quantity < (int)$attribute_stock->stock)
      {
        Cart::where('id', $id)->increment('quantity');
        return response()->json(['message' => 'Item quality is increased'], 200);
      }

      
      return response()->json(['message' => 'Item quality is not avaiable'], 404);
    
  }
  public function decreaseCart($id)
  {
    Session::forget('CouponAmount');
    Session::forget('CouponCode');
    $origin_cart = Cart::where('id', $id)->first();
    
    if ($origin_cart->quantity > 0) {
       Cart::where('id', $id)->decrement('quantity');
       return response()->json(['message' => 'Item quality is decreased'], 200);
    }

    return response()->json(['message' => 'Item quality is at least 0'], 404);

  }

  public function applyCoupon(){
    Session::forget('CouponAmount');
    Session::forget('CouponCode');

   $couponCount = Coupon::where('coupon_code',request()->coupon_code)->count();
   if($couponCount == 0){
     return redirect()->back()->with('error','Coupon is not valid');
   }
   else{
     $coupon = Coupon::where('coupon_code',request()->coupon_code)->first();
     // Coupon is inactive
     if($coupon->status == 0){
      return redirect()->back()->with('error','Coupon is not active');
    }
    
    $mytime = date('Y-m-d');
     
    if($coupon->expiry_date < $mytime){
      return redirect()->back()->with('error','Coupon is Expired');
    }

    $session_id = Session::get('session_id');
    $carts = Cart::where(['session_id' => $session_id])->get();
    $total_amount = 0;
    foreach($carts as $cart){
      $total_amount += $cart->price * $cart->quantity;
    }
    if($coupon->amount_type == "Fixed"){
      $couponAmount = $coupon->amount;
    }else{
      $couponAmount = $total_amount * ($coupon->amount /100);
    }

    Session::put('CouponAmount',$couponAmount);
    Session::put('CouponCode',request()->coupon);

    return redirect()->back()->with('success','Coupon is successfully applied . You are avaiable discount now.');
   }
  }

  // public function deleteCoupon(){

  // }
}


