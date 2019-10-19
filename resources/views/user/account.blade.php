@extends('user.layout.master')

@section('style')
<style>
    form .error {
        color: #ff0000;
    }
</style>
@endsection
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Update Account</h2>
                    <form action="{{ url('/account') }}" method="post" id="updateAccount">
                        @csrf
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                        <input type="text" name="name" id="name" placeholder="Name" value="{{ auth()->user()->name }}" />
                        <input type="text" name="address" id="address" placeholder="Address" />
                        <input type="text" name="city" id="city" placeholder="City" />
                        <input type="text" name="state" id="state" placeholder="State" />
                        <select name="country" id="country">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->country_name}}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                        <p></p>
                        <input type="text" name="pincode" id="pincode" placeholder="Pincode" />
                        <input type="text" name="mobile" id="mobile" placeholder="Mobile" />

                        <button type="submit" class="btn btn-default">Update</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Update Password</h2>
                    <form action="{{ url('/update-user-password') }}" method="post">
                        @csrf
                        <input type="password" placeholder="Current Password" name="password" id="currentPassword"/>
                        <input type="password" placeholder="New Password" name="newpassword" />
                        <input type="password" placeholder="Confirmed Password" name="password_confirmation" />

                        <button type="submit" class="btn btn-default">Change</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->

@endsection
@section('script')
<script>
    $(document).ready(function($) {
        $('#rpassword').passtrength({
            minChars: 4,
            passwordToggle: true,
            tooltip: true,
            eyeImg: 'user/images/eye.svg'
        });


        //Form Validate with Jquery
        $('form[id="updateAccount"]').validate({
            rules: {

                name: {
                    required: true,
                    minlength: 2,
                    accept: "[a-zA-Z]+"

                },
                address: {
                    required: true,

                },

                city: {
                    required: true,

                },
                state: {
                    required: true,

                },
                country: {
                    required: true,

                },
                pincode: {
                    required: true,

                },
                mobile: {
                    required: true,

                },


            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $("#currentPassword").mouseleave(function(){
                let current_password = $("#currentPassword").val();
                console.log(current_password)
                $.ajax({
                        type : 'get',
                        url : '/user-checkPassword',
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
    })
</script>

@endsection