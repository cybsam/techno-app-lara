<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sign Up - Techno Apogee Limited</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="{{ asset('image/FrontEnd/logoFav/fav.png') }}" type="image/x-icon">
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
    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
		<h2>Sign Up</h2>
		{{-- <p class="hint-text">Create your account. It's free and only takes a minute.</p> --}}
        <div class="form-group">
			<div class="row">
                <div class="hint-text text-info" style="color: rgb(25, 25, 230)">
                    <hr style="color:#969fa4">
                    @if (Session::get('regSucc'))
                        {{-- <script>window.alert("{{ Session::get('regSucc') }}")</script> --}}
                        <strong style='text-align: center; font-style:italic;'>{{ Session::get('regSucc') }}</strong>
                        <hr>
                    @endif
                </div>
                <div class="hint-text text-danger" style="color: rgb(230, 21, 21);">
                    @if (Session::get('regError'))
                        <strong style="font-style:italic;">{{ Session::get('regError') }}</strong>
                    @endif
                </div>
				<div class="col-xs-6">
                    <span>Name</span>
                    <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" required="required" autocomplete="name" autofocus>
                    <div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <span style="color:rgb(241, 39, 39);">{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
				<div class="col-xs-6">
                    <span>User Name</span>
                    <input type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="User Name" required="required" autocomplete="username" autofocus>
                    <div>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <span style="color:rgb(241, 39, 39);">{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
			</div>        	
        </div>
        <div class="form-group">
            <span>Email</span>
        	<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" name="email" placeholder="Email" autocomplete="email" required="required">
            <div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <span style="color:rgb(241, 39, 39);">{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>
		<div class="form-group">
            <span>Password</span>
            <input type="password" class="form-control @error('password') is-invalie @enderror" id="password" name="password" autocomplete="new-password" placeholder="Password" required="required">
            <div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <span style="color:rgb(241, 39, 39);">{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>
		<div class="form-group">
            <span>Confirm Password</span>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password" required="required">
        </div>
        <div class="form-group">
            <span>User Image</span>
            <input type="file" name="user_image" id="user_image" class="form-control" name="user_image">
            <div>
                @error('user_image')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>  
        <div class="form-group">
			<label class="checkbox-inline"><input name="checkbox" value="checkbox" type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="{{ route('login') }}">Sign in</a></div>
</div>
{{-- <script>
    (() => {
        const jsTextBlock = document.getElementById('username'), jsTextInput = document.getElementById('name');
        if((jsTextInput.value).length === 0){
            jsTextBlock.innerHTML = '';
        }
        jsTextInput.addEventListener('input', () =>{
            jsTextBlock.setAttribute('data-text', jsTextInput.value)
            jsTextBlock.innerHTML = jsTextBlock.getAttribute('data-text')
            if((jsTextInput.value).length === 0){
                jsTextBlock.innerHTML = ''
            } 
        })
    })()
</script> --}}
</body>
</html>



        {{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
