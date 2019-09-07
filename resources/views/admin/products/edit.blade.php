@extends('admin.layout.master')
@section('content')
                           
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                <div class="card-header bg-light">Edit {{ ucfirst($product->name) }}</div>
                    <div class="card-body">
                    
                <form action="{{ route('products.update',$product->id)}}" id="createProduct" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group ">
                            <label for="category_id" class="control-label mb-1 ">Choose Category </label>
                            
                                <select name="category_id" id="category_id" class="categorySelect  form-control ">
                                    
                                    
                                    
                                       <?php echo $categoriesDropdown; ?>
                                    
                                  </select>
                            
                          </div>

                          <div class="form-group">
                                <label for="product_name" class="control-label mb-1">Product Name</label>
                          <input id="product_name" value= "{{ $product->product_name }}" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="eg.product">
                        </div>

                        

                        <div class="form-group">
                            <label for="product_code" class="control-label mb-1">Product Code</label>
                        <input id="product_code" value="{{ $product->product_code }}" name="product_code" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="eg.pt1001">
                        </div>

                        <div class="form-group has-success">
                            <label for="description" class="control-label mb-1">Product Description</label>
                            <textarea name="description" id="description" rows="9" placeholder="eg.This is product..." class="form-control">
                                {{ $product->description }}
                            </textarea>
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group has-success">
                          <label for="care" class="control-label mb-1">Material & Care</label>
                          <textarea name="care" id="care" rows="9" placeholder="eg.This is product..." class="form-control">
                            {{ $product->care }}
                          </textarea>
                          <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                      </div>

                        <div class="form-group">
                                <label for="image" class="control-label mb-1 btn btn-outline-primary">Choose Image</label>
                              <input type="file" id="image"  name="image" class="form-control-file " value="/images/backend/products/medium/{{ $product->image }}" style="display:none;"/>
                        
                        <img src="/images/backend/products/medium/{{ $product->image }}" class="img-thumbnail showfile" width="35" />
                        </div>

                        

                       

                        <div class="form-group row">
                           <div class="col-md-6">

                              <label for="product_color" class="control-label mb-1">Product Color</label>
                           <input id="product_color" value="{{ $product->product_color }}" name="product_color" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="eg.black">
                                   
                            </div>
                          <div class="col-md-6">
                            <label for="price" class="control-label mb-1">Product Price</label>
                          <input id="price" name="price" value="{{ $product->price }}" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="eg.price">
                          </div>
                          
                        </div>

                        

                        

                        
                        <button id="payment-button" type="submit" class="btn  btn-info btn-block">
                        <i class="fa fa-save "></i>&nbsp;
                        <span id="payment-button-amount">Save Category</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                        </div>
                    </form>
                    </div>
                    </div>
            </div>
        </div>

@endsection
@section('script')
<script>
   $(document).ready(function() {
       
    
    $('.categorySelect').select2({
        placeholder : "Select Category"
    });
    $('input#image').change(function (){
      if (this.files && this.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.showfile').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
     });

    
        


        //Form Validate with Jquery
        $('form[id="createProduct"]').validate({
        rules: {
            category_id: {
            required: true,
            
          },
          
          product_name: {
            required: true,
            
          },
          description: {
            required: true,
            
          },
          product_color: {
            required: true,
            
          },
          product_code: {
            required: true,
            
          },
          price: {
            required: true,
            
          },
          
          image: {
            required: true,
            
          },
          
          
        },
        
        submitHandler: function(form) {
          form.submit();
        }
      });
   })
</script>

@endsection

@section('css')
<style>
       form .error {
  color: #ff0000;
}
</style>
@endsection
    

