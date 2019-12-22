<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    {{-- Icon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/smkn2.png') }}">

    {{-- Styles --}}
	<link rel="stylesheet" type="text/css" href="{{ asset("vendors/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("font/font-awesome-4.7.0/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset("css/util.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/main.css") }}">
    
    {{-- Scripts --}}	
	<script src="{{ asset("vendors/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("js/main-login.js") }}"></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.js') }}"></script>
    
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(img/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route("login") }}">
                    @csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter email" autocomplete="off" autofocus value="{{ old("email") }}">
                        <span class="focus-input100"></span>
                    </div>
                    
                    @error("email")
                        <script>
                            Swal.fire({
                                type: 'error',
                                title: '{{ $message }}'
                            })
                        </script>
                    @enderror

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
                    </div>
                    
                    @error("password")
                        <script>
                            Swal.fire({
                                type: 'error',
                                title: '{{ $message }}'
                            })
                        </script>
                    @enderror

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>