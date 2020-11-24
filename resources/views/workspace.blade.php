@extends('layout.dashboard')

@section('title', 'WorkSpace')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item active">
			<a href="">Dashboard</a>
		</li>
		@yield('breadcum-item')
	</ol>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col workspace border rounded">
			<h3 class="title"><i class="fas fa-cube"></i> Projects</h3>
			<div class="">
				@if(isset(Auth::user()->email))
					@foreach($projects as $project)
					<div class="border rounded workspace-list-item">
						<a class="workspace-link" href="{{ url('/projects/'.$project->name) }}"><i class="fas fa-cube"></i> {{$project->name}}</a>
						<small class="form-text text-muted listed-date ml-4">{{\Carbon\Carbon::parse($project->created_at)->format('d/m/Y')}}</small>
					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</div>
@endsection