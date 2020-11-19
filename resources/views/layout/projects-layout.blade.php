@extends('layout.dashboard')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item active">
			<a href="/">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">
			<a href="/projects">Projects</a>
		</li>
		@yield('breadcum-item')
	</ol>
@endsection