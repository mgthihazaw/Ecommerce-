@extends('user.layout.master')

@section('style')
<style>

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
                    <h2>Login to your account</h2>
                    <form action="{{ url('/login-register') }}" method="post">
                    @csrf
                        <input type="text" placeholder="Name" />
                        <input type="email" placeholder="Email Address" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
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
                    <h2>New User Signup!</h2>
                    <form action="{{ url('/login-register') }}" method="post">
                    @csrf
                        <input type="text" placeholder="Name" name="name" />
                        <input type="email" placeholder="Email Address" name="email"/>
                        <input type="password" placeholder="Password" name="password" id="rpassword"/>
                        <button type="submit" class="btn btn-default">Signup</button>
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
          eyeImg : 'user/images/eye.svg'
        });
      });
</script>

@endsection