@extends('admin.layout.master')
@section('content')
   
    <div class="row justify-content-center">
            <div class=" col-md-8">
                    <div class="card ">
                            <div class="card-header bg-info">
                               <strong>Password Change</strong> Form
                            </div>
                            
                            <div class="card-body card-block">
                            <form  action="{{ route('changePassword') }}" method="post" id="changePassword" name="changePassword">
                                @csrf
                                <div class="form-group">
                                    <label for="currentPassword" class=" form-control-label">Current Password</label>
                                    <input type="password" id="currentPassword" name="currentPassword" placeholder="Enter Current Password.." class="form-control">
                                    
                                </div>
                                <div class="form-group">
                                        <label for="newPassword" class=" form-control-label">New Password</label>
                                        <input type="password" id="newPassword" name="newPassword" placeholder="Enter New Password.." class="form-control">
                                        
                                </div>
                                <div class="form-group">
                                        <label for="confirmPassword" class=" form-control-label">Confirm Password</label>
                                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter Confirmed Password.." class="form-control">
                                        
                                </div>
                                <button type="submit" class="btn btn-info btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Change Password
                                                </button>
                               </form>
                            </div>
                            
                        </div>
            </div>
    </div>

@endsection
@section('script')
<script>
   $(document).ready(function() {
        //Passwork Check
        $("#currentPassword").keyup(function(){
                let current_password = $("#currentPassword").val();
                
                $.ajax({
                        type : 'get',
                        url : '/admin/checkPassword',
                        data : {current_password :current_password},
                        success : function(res){
                                if($('.ckPasswork')){
                                $('.ckPasswork').empty();
                                }
                                if(res == 'false'){
                                        $('#currentPassword')
                                        .after("<font color='red' class='ckPasswork'>Current Password is Incorrect</font>")
                                }else if(res == "true"){
                                        $('#currentPassword')
                                        .after("<font color='green' class='ckPasswork'>Current Password is Correct</font>")
                                }
                        },
                        error : function(err){
                                alert(err)
                        }
                })
        })

        


        //Form Validate with Jquery
        $('form[id="changePassword"]').validate({
        rules: {
          
         current_password: {
            required: true,
            minlength: 6,
          },
          newPassword: {
            required: true,
            minlength: 6,
          },
          confirmPassword: {
            required: true,
            
            equalTo: "#newPassword"
          }
        },
        messages: {
          
          current_password: {
            minlength: 'Password must be at least 6 characters long'
          },
          newPassword: {
            minlength: 'Password must be at least 6 characters long'
          },
          password: {
            minlength: 'Password must be at least 6 characters long',
           
          }
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
    
