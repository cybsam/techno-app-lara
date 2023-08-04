
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sign In - Techno Apogee Limited</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<link rel="shortcut icon" href="{{ asset('image/FrontEnd/logoFav/fav.png') }}" type="image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	body {
		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
</style>
</head>
<body>
<div class="signup-form">
    <a href="{{ url('/') }}"><img src="{{ asset('image/FrontEnd/logoFav/logo.PNG') }}" height="70px"
        width="100%" alt="Techno Logo"></a>
    <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
        @csrf
		<h2>Log In</h2>
		{{-- <p class="hint-text">Create your account. It's free and only takes a minute.</p> --}}
        <div class="hint-text text-danger" style="color: rgb(230, 21, 21);">
			@if (Session::get('logfaild'))
				<strong>{{ Session::get('logfaild') }}</strong>
			@endif
		</div>
		<div class="hint-text text-info" style="color: rgb(25, 25, 230)">
			@if (Session::get('succ'))
				<strong>{{ Session::get('succ') }}</strong>
			@endif
		</div>
        <div class="form-group">
            <span>Email</span>
        	<input type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ Session::get('verifyedEmail') ? Session::get('verifyedEmail') : old('email') }}" name="email" placeholder="Email" autocomplete="email" autofocus required="required">
            <div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
		<div class="form-group">
            <span>Password</span><span style="float: right;">@if (Route::has('password.request'))
                <a class="link-warning link-offset-2"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif</span>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required="required" autocomplete="current-password">
            <div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
		  
        <div class="form-group">
			<label class="checkbox-inline">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label text-white" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                
            </label>
		</div>
        
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Log In</button>
        </div>
    </form>
	<div class="text-center">Need an account? <a href="{{ route('register') }}">Sign up</a></div>
</div>
</body>
</html>

