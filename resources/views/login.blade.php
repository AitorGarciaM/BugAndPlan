<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>My site - Login</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
</head>
<body class="login">
	<div class="container">
		<div class="center border rounded">

			@if(isset(Auth::user()->email))

			<script>window.location = "/";</script>

			@endif

			@if($message = Session::get('error'))

				<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>{{ $message }}</strong>
				</div>

			@endif
			@if (count($errors) > 0)

				<div>
					<ul>
						@foreach($errors->all() as $error)

							<li>{{ $error }}</li>

						@endforeach
					</ul>
				</div>

			@endif

			<form class="center" method="post" action="{{ url('/login/checkLogin') }}">	
				{{ csrf_field() }}
				<div class="form-group row">
					<h4>User Login</h4>
				</div>
				<div class="form-group row">
					<div class="col-md-20">
						<lavel>User:</lavel><br>
						<input class="form-control form-control-sm" id="login-username" type="email" name="email">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-20">
						<lavel>Password:</lavel><br>
						<input class="form-control form-control-sm" id="login-userpassword" type="Password" name="password">
					</div>
				</div>
				<div class="form-group row">
					<input type="submit" name="login" class="btn btn-primary" value="Login"/>
				</div>
				<div class="form-group row">
					<div class="col-md-20">
						<p id="register">Don't you have an acount? <a href="#">register here</a>.</p>
					</div>
				</div>
			</form>
		</div>
	</div>

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" href="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>