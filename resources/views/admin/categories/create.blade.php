@extends('admin.layout.master')
@section('content')
                           
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header bg-light">Add Category Form</div>
                    <div class="card-body">
                    
                <form action="{{route('category.store')}}" id="createCategory" method="post" >
                    @csrf
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Category Name</label>
                            <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="eg.product">
                        </div>
                        <div class="form-group has-success">
                            <label for="description" class="control-label mb-1">Category Description</label>
                            <textarea name="description" id="description" rows="9" placeholder="eg.This is product..." class="form-control"></textarea>
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group ">
                          <label for="parent_id" class="control-label mb-1 ">Category Label</label>
                          
                              <select name="parent_id" id="parent_id" class="levelCategory  form-control ">
                                  
                                  <option value=" 0"> Main Category </option>
                                  @foreach($levels as $level)
                                    <option value="{{ $level->id}}"> {{ $level->name }} </option>
                                  @endforeach
                                </select>
                          
                        </div>

                        <div class="form-group">
                          <label for="url" class="control-label mb-1">URL</label>
                          <input id="url" name="url" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="eg.product">
                        </div>

                        <div class="form-group">
                          &nbsp;&nbsp; &nbsp;&nbsp;
                          <label for="status" class="form-check-label ">
                           <input type="checkbox" id="status" name="status" value="option3" class="form-check-input">Enabled
                             </label>
                            
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
       
    
    $('.levelCategory').select2();

        


        //Form Validate with Jquery
        $('form[id="createCategory"]').validate({
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
    
