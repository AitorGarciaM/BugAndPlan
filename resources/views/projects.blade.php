@extends('layout.projects-layout')

@section('title', 'Project')

@section('content')
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Created at</th>
				<th scope="col">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($projects as $project)
				<tr>
					<td><a class="project-link" href="{{ url('/projects/'.$project->name) }}">{{$project->name}}</a></td>
					<td><p class="listed-date">{{\Carbon\Carbon::parse($project->created_at)->format('d/m/Y')}}</p></td>
					@if($project->pivot->role_id == 1)
					<td><a class="btn btn-danger" href="{{url('/projects/delete/'.$project->id)}}">Delete</a></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection