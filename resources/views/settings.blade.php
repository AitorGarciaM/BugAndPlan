@extends('layout.dashboard')
@section('title', 'Settings')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item active">
			<a href="/">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">
			<a href="">Settings</a>
		</li>
	</ol>
@endsection

@section('content')
	<div class="container">
		<form method="post" action="{{url('/settings/submit')}}">
			@csrf
			<div class="row">
				<div class="form-group col">
					<label>Change email</label><br>
					<input type="email" name="email" class="form-controller">
				</div>

				<div class="form-group col">
					<label>Change password</label><br>
					<input type="password" name="password" class="form-controller">
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col">
					<label>Repeat email</label><br>
					<input type="email" name="repeat_email" class="form-controller">
				</div>

				<div class="form-group col">
					<label>Repeat password</label><br>
					<input type="password" name="repeat_password" class="form-controller">
				</div>
			</div>

			<div class="form-group ml-56">
				<button class="btn btn-danger">Cancel</button>
				<button type="submit" class="btn btn-primary ">Submit</button>
			</div>
		</form>
	</div>
@endsection