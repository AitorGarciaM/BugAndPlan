@extends('layout.projects-layout')

@section('title', 'Users')

@php
	$users = $project->users()->get();
	$currentUser;
	foreach($users as $user)
	{
		if($user->id)
		{
			if($user->id == Auth::id())
			{
				$currentUser = $user;
			}
		}
		else 
		{
			echo Auth::id();
		}
	}
@endphp

@section('sidebar-item')
<li class="nav-item {{ 'projects/'.$project->name == request()->path() ? 'active' : '' }}">
	<a class="nav-link" role="tablist" href="{{url('/projects/'.$project->name)}}">
		<i class="fas fa-bug"></i>
			<span>Bugs</span>
	</a>
</li>
<li class="nav-item {{ 'projects/'.$project->name.'/users' == request()->path() ? 'active' : '' }}">
	<a class="nav-link" role="tablist" href="{{url('/projects/'.$project->name.'/users')}}">
		<i class="fas fa-user"></i>
			<span>Users</span>
	</a>
</li>
@endsection

@section('breadcum-item')
		<li class="breadcrumb-item active">
			<a href="">{{ $project->name }}</a>
		</li>
		<li class="breadcrumb-item active">
			<a href="{{url('/projects/'.$project->name.'/users')}}">Users</a>
		</li>
@endsection
	
@section('content')
	<a class="btn floating-button rounded-circle" title="Add new user" role="button" data-toggle="modal" id="createBug" href="#addUser">
		<i class="fas fa-plus text-white"></i>
	</a>
	<div id="users">
		<table class="table table-bordered mt-3">
	<thead>
		<tr>
			<th scope="col">Name</th>
			<th scope="col">email</th>
			<th scope="col">rol</th>
			@if($currentUser->pivot->role_id == 1)
			<th scope="col">Delete</th>
			@endif
		</tr>
	</thead>
	<tbody>
	
		@foreach($project->users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				@if($currentUser->pivot->role_id == 1)
				<td class="align-middle text-center">
					<form method="post" action="{{url('/projects/users/'.$user->id.'/'.$project->id)}}">
						@csrf
						<select name="role" id="role" class="custom-select" onchange="this.form.submit()">
							@php
								$roles = \Spatie\Permission\Models\Role::all();

								foreach($roles as $role)
								{
									if($user->pivot->role_id == $role->id)
									{
										echo '<option value="'.$role->id.'" selected>'.$role->name.'</option>';
									}
									else
									{
										echo '<option value="'.$role->id.'">'.$role->name.'</option>';
									}
								}
							@endphp
						</select>
					</form>
				</td>
				<td><a class="btn btn-danger" href="{{url('/projects/'.$project->name.'/users/'.$user->id)}}">Delete</a></td>
				@else
				<td>
					@php
						$roles = \Spatie\Permission\Models\Role::all();

						foreach($roles as $role)
						{
							if($user->pivot->role_id == $role->id)
							{
								echo $role->name;
								break;
							}
						}
					@endphp
				</td>
				@endif
			</tr>
		@endforeach
	</tbody>
</table>
	</div>
@endsection

@section('modals')
	<div class="modal fade" id="addUser" tabindex="-1">
		<div class="modal-dialog">

			<!--Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--form-->
				<form method="post" action="{{url('/projects/'.$project->name.'/users/add-user')}}">
					@csrf
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" type="email" name="email">
							</div>
						</div>
						<div class="col">
								<div class="form-group">
								<label>Role</label>
								<select name="role" id="role" class="custom-select" onchange="this.form.submit()">
									@php
										$roles = \Spatie\Permission\Models\Role::all();

										foreach($roles as $role)
										{
											echo '<option value="'.$role->id.'">'.$role->name.'</option>';
										}
									@endphp
								</select>
								</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<input type="submit" name="login" class="btn btn-primary" value="Add"/>
				</div>
				</form>
				<!-------->
			</div>
		</div>
	</div>
@endsection