@extends('layout.projects-layout')

@section('title', 'Project')

@section('sidebar-item')
<li class="nav-item {{ '/projects/'.$project->name == request()->path() ? 'active' : '' }}">
	<a class="nav-link" role="tablist" href="{{url('/projects/'.$project->name)}}">
		<i class="fas fa-bug"></i>
			<span>Bugs</span>
	</a>
</li>
<li class="nav-item {{ '/projects/'.$project->name.'/users' == request()->path() ? 'active' : '' }}">
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
@endsection

@section('content')
	
	<a class="btn floating-button rounded-circle" title="Report new issue" role="button" data-toggle="modal" id="createBug" href="#createBugModal">
		<i class="fas fa-plus text-white"></i>
	</a>	
	<div id="issues">
		<table class="table table-bordered mt-3">
			<thead>
				<tr>
					<th scope="col">Title</th>
					<th scope="col">Description</th>
					<th scope="col">Status</th>
					<th scope="col">Priority</th>
					<th scope="col">Created by</th>
					<th scope="col">Closed by</th>
				</tr>
			</thead>
			<tbody>	
				@foreach($issues as $issue)		
				<tr>
					<td class="align-middle text-center">{{$issue->title}}</td>
					<td class="align-middle text-center">{{$issue->description}}</td>
					@if(auth()->user()->hasRole(['admin|developer']) && !$issue->closed_by_user_id)
					<td class="align-middle text-center">
						<form method="post" action="{{url('/projects/'.$project->name.'/update-issue-status/'.$issue->id)}}">
							@csrf
							<select name="status" id="status" class="custom-select" onchange="this.form.submit()">
								@php
									$statuses = App\IssueStatus::all();

									foreach($statuses as $status)
									{
										if($issue->status->id == $status->id)
										{
											echo '<option value="'.$status->id.'" selected>'.$status->type.'</option>';
										}
										else
										{
											echo '<option value="'.$status->id.'">'.$status->type.'</option>';
										}
									}
								@endphp
							</select>
						</form>
					</td>
					@else
					<td class="align-middle text-center">{{$issue->status->type}}</td>
					@endif
					@if(auth()->user()->hasRole(['admin|developer']) && !$issue->closed_by_user_id)
					<td class="align-middle text-center">
						<form method="post" action="{{url('/projects/'.$project->name.'/update-issue-priority/'.$issue->id)}}">
							@csrf
							<select name="priority" class="custom-select" onchange="this.form.submit()">
								@php
									$priorities = App\IssuePriority::all();

									foreach($priorities as $priority)
									{
										if($issue->priority->id == $priority->id)
										{
											echo '<option value="'.$priority->id.'" selected>'.$priority->type.'</option>';
										}
										else
										{
											echo '<option value="'.$priority->id.'">'.$priority->type.'</option>';
										}
									}
								@endphp
							</select>
						</form>
					</td>
					@else
					<td class="align-middle text-center">{{$issue->priority->type}}</td>
					@endif
					<td class="align-middle text-center">{{App\User::where(['id' => $issue->created_by_user_id])->first()->name}}</td>
					<td class="align-middle text-center">
					@php 
						$user = App\User::where(['id' => $issue->closed_by_user_id])->first();
						if($user)
						{
							echo $user->name;
						}
						else
						{
							echo '<a class="btn btn-danger" href="./'.$project->name,'/close-issue/'.$issue->id,'">Close</a>';
						}
					@endphp</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('modals')
	<div class="modal fade" id="createBugModal" tabindex="-1">
		<div class="modal-dialog">

			<!--Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Report new issue</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--form-->
				<form method="post" action="{{url('/projects/'.$project->name.'/create-issue')}}">
					@csrf
				<div class="modal-body">
					<div class="row">
						<div class="col">						
							<div class="form-group">
								<label>Title</label>
								<input class="form-control" type="text" name="title">
							</div>
							<div class="form-group">
								<label>Priority</label>
								<select name="priority" class="custom-select">
									@php
										$priorities = App\IssuePriority::all();

										foreach($priorities as $priority)
										{
											echo '<option>'.$priority->type.'</option>';
										}
									@endphp
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control fixed-size" name="description" rows="3"></textarea>
							</div>	
						</div>	
					</div>				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<input type="submit" name="login" class="btn btn-primary" value="Create" />
				</div>
				</form>
				<!-------->
			</div>
		</div>
	</div>
@endsection