@extends('admin.layout.master')
@section('content')
                           
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header bg-light">Edit Banner Form</div>
                    <div class="card-body">
                    
                <form action="{{route('banners.update',$banner->id)}}" id="editBanner" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Banner Title</label>
                            <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $banner->title }}">
                        </div>                      

                        <div class="form-group">
                          <label for="link" class="control-label mb-1">Link</label>
                          <input id="link" name="link" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $banner->link }}">
                        </div>

                        <div class="form-group">
                                <label for="image" class="control-label mb-1 btn btn-outline-primary">Choose Image</label>
                              <input type="file" id="image"  name="image" class="form-control-file " value="{{ $banner->image }}" style="display:none;"/>
                        
                        <img src="/images/backend/banners/{{ $banner->image }}" class="img-thumbnail showfile" width="35" />
                        </div>

                        <div class="form-group">
                          &nbsp;&nbsp; &nbsp;&nbsp;
                          <label for="status" class="form-check-label ">
                           <input type="checkbox" id="status" name="status" value="option3" class="form-check-input"{{ $banner->status ? 'checked' : ''}}>Enabled
                             </label>
                            
                        </div>


                        
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-save fa-lg"></i>&nbsp;
                        <span id="payment-button-amount">Update Banner</span>
                        
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
        $('form[id="editBanner"]').validate({
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
    
