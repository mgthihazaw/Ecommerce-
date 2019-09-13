@extends('admin.layout.master')
@section('content')
               
        <div class="row ">
            
            <div class="col-md-12 row jumbotron " >
                
                <div class="col-md-4">
                   <a  class=" image" >
                        <img class="rounded mx-auto d-block " src="/images/backend/products/small/{{ $product->image }}" alt="">
                   </a>
                 </p>
                </div>
                <div class="col-md-6 py-3 ">
                   <div >
                   <h3  class="card-title mb-5"> {{ $product->product_name }} {{ $product->product_code }}</h3>
                   <b>Product Name &nbsp;&nbsp;&nbsp;   : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $product->product_name }}<br><br>
                        <b>Product Code &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $product->product_code }}<br><br>
                        <b>Product Color &nbsp;&nbsp;&nbsp; &nbsp;  : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $product->product_color }}<br><br>
                        <b>Product Price &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $product->price }}<br>
                        
                   </div>
                </div>


            </div>
            
            

            <!---------------Table --------------------->


            <div class="col-md-12">

                <div class="top-campaign">
                <h3 class="title-3 ">Product Attributes 
                        
                </h3>
                <div class="form col-12">
                
                        <form method="post" action="{{route('products.productAttributes.store',$product->id)}}">
                            @csrf
                            <div class="form">
                                    <div class="form-group row attrGroup">

                                            <input type="text" class="form-control col-md-2 mr-2" placeholder="SKU" name="sku[]">
                                            <input type="text" class="form-control col-md-2 mr-2" placeholder="size" name="size[]">
                                            <input type="text" class="form-control col-md-2 mr-2" placeholder="price" name="price[]">
                                            <input type="text" class="form-control col-md-2 mr-2" placeholder="stock" name="stock[]">
                                            <button type="button" class="btn col-md-1 btn-outline-success addAttribute">
                                               <i class="fas fa-plus-circle"></i>&nbsp; ADD</button>
                                     </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-md-2 ">
                                    <i class="fas fa-save"></i>&nbsp; Save</button>
                        </form>
                       
                        
                 </div>
                <div class="table-responsive">


                  <table class="table table-top-campaign">
                    <tbody>
                       <tr>
                           <th>No</th>
                           <th>SKU</th>
                           <th>Size</th>
                           <th>Price</th>
                           <th>Stock</th>
                           <th></th>
                       </tr>
                       @foreach($attributes as $key => $attribute)
                        <tr>
                            <form method="post" action="{{ route('products.productAttributes.update',[$product->id,$attribute->id]) }}">
                                @csrf
                                @method('PUT')
                                <td>&nbsp;&nbsp;{{ $key+1 }}</td>
                                <td>&nbsp;&nbsp;{{ $attribute->sku }}</td>
                                <td>&nbsp;&nbsp;{{ $attribute->size }}</td>
                                <td>
                                    <input type="text" value="{{ $attribute->price }}" name="price" autofocus>
                                </td>
                                <td><input type="text" value="{{ $attribute->stock }}" name="stock"></td>
                                <td>
                                <div class="row">
                                    <button type="submit" class="btn">
                                            <i class="fas fa-save text-warning"></i>
                                            
                                    </button>
                            </form>
                                             <form class="deleteProductAttribute" action="{{route('products.productAttributes.destroy',[$product->id,$attribute->id])}}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                   {{ csrf_field() }}
                                                   <button type="submit" class="btn " id="deleteProductAttribute">
                                                      <i class="fas fa-trash text-danger"></i>
                                                   </button>
                                             </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
                
                </div>




        </div>

@endsection
@section('script')
<script>
   $(document).ready(function() {
    // $("form").submit(function(e){
    //     e.preventDefault();
    // });
    $(".deleteProductAttribute").click(function(){
                return confirm('Are you sure to delete this category?')
        })
    
    $('.addAttribute').click(function(e){
        e.preventDefault();
        
        $('form .form').append(`<div class="form-group row attrGroup">

                            <input type="text" class="form-control col-md-2 mr-2" placeholder="SKU" name="sku[]">
                            <input type="text" class="form-control col-md-2 mr-2" placeholder="size" name="size[]">
                            <input type="text" class="form-control col-md-2 mr-2" placeholder="price" name="price[]">
                            <input type="text" class="form-control col-md-2 mr-2" placeholder="stock" name="stock[]">
                            <button type="button" class="btn btn-outline-danger col-md-1 remove">Remove</button>
                            
                          </div>`)
                         
    })
    
    $("body").on("click",".remove",function(){ 
        
        $(this).parents(".attrGroup").remove();
    });
    

        


   })
</script>

@endsection

@section('css')
<style>
       form .error {
  color: #ff0000;
}
.form {
    padding : 20px;
}
</style>
@endsection
    
