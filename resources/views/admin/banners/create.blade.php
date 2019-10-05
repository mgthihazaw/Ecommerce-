@extends('admin.layout.master')
@section('content')
                           
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header bg-light">Add Banner Form</div>
                    <div class="card-body">
                    
                <form action="{{route('banners.store')}}" id="createBanner" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Banner Title</label>
                            <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                        </div>

                        <div class="form-group">
                          <label for="link" class="control-label mb-1">Link</label>
                          <input id="link" name="link" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                        </div>

                        <div class="form-group">
                                <label for="image" class="control-label mb-1 btn btn-outline-primary">Choose Image</label>
                              <input type="file" id="image"  name="image" class="form-control-file " value="" style="display:none;"/>
                        
                        <img src="" class="img-thumbnail showfile" width="35" />
                        </div>

                        <div class="form-group">
                          &nbsp;&nbsp; &nbsp;&nbsp;
                          <label for="status" class="form-check-label ">
                           <input type="checkbox" id="status" name="status" value="option3" class="form-check-input">Enabled
                             </label>
                            
                        </div>
            
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-save fa-lg"></i>&nbsp;
                        <span id="payment-button-amount">Save Banner</span>
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
        $('form[id="createBanner"]').validate({
        rules: {
          
         title: {
            required: true,
            
          },
          link: {
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
    
