@extends('admin.layout.master')
@section('content')
                           
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header bg-light">Add Category Form</div>
                    <div class="card-body">
                    
                <form action="{{route('category.update',$category->id)}}" id="editCategory" method="post" >
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Category Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category->name}}">
                        </div>
                        <div class="form-group has-success">
                            <label for="description" class="control-label mb-1">Category Description</label>
                            <textarea name="description" id="description" rows="9"  class="form-control">
                                    {{ $category->description }}
                            </textarea>
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                          <label for="url" class="control-label mb-1">URL</label>
                          <input id="url" name="url" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category->url}}">
                      </div>
                        
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-save fa-lg"></i>&nbsp;
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
       

        


        //Form Validate with Jquery
        $('form[id="editCategory"]').validate({
        rules: {
          
         name: {
            required: true,
            
          },
          description: {
            required: true,
            
          },
          url: {
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
    
