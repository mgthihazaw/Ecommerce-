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
                <h3 class="title-3 ">Product Images </h3>
                <div class="form col-12">
                
                        <form method="post" action="{{route('products.productImages.store',$product->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form">
                                <div class="form-group row attrGroup">

                                    <div class="form-group row">
                                        
                                           <input type="file" id="image"  name="image" class="d-block p-2 bg-white border border-right-0 border-info text-white text-center">
                                               
                                    
                                        
                                        <button type="submit" class="btn btn-info ">
                                            Upload</button>
                                    </div>
                                    
                                </div>
                            </div>
                           
                        </form>
                       
                        
                 </div>

                 <div class="table-responsive">
                    <table class="table table-top-campaign">
                      <tbody>
                         <tr>
                             <th>No</th>
                             
                             <th>Product Image</th>
                             
                             <th></th>
                         </tr>
                         @foreach($productImages as $key => $productImage)
                          <tr>
                              <td>&nbsp;&nbsp;{{ $key+1 }}</td>
                              
                              <td>&nbsp;&nbsp;
                                <a href="/images/backend/products/medium/{{ $productImage->image }}" class=" image" >
                                    <img  width="100px" height="50px" src="/images/backend/products/medium/{{ $productImage->image }}" class="zoom img-thumbnail" alt="Image"/></a>
                              </td>
                              
                              <td>&nbsp;&nbsp;
                                 
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
    $('img.zoom')
    .wrap('<span style="display:inline-block;"></span>')
    .css('display', 'block')
    .parent()
    .zoom();

    $(".deleteProductAttribute").click(function(){
                return confirm('Are you sure to delete this category?')
        })
    
   
    

        


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
    
