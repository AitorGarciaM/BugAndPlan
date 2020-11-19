<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>@yield('title')</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/customSidebar.css') }}">
	
</head>
<body class="dashboard">
	@if(!Auth::check())
		<script>window.location = '{{ URL::to("login") }}'</script>
	@endif
	<div id="wrapper">
		<!--Sidebar-->
		<ul class="sidebar navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/') }}">
			 		<h3>BugTracker</h3>
			 	</a>
			</li>			
			<li class="nav-item {{  '/' == request()->path() ? 'active' : '' }}">
				<a class="nav-link " role="tablist" href="{{ url('/') }}">
			 		<i class="fas fa-home"></i>
			 		<span>Workspace</span>
			 	</a>
			</li>
			<li class="nav-item">
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" role="tablist" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span><i class="fas fa-cube"></i> Projects</span>
					</a>
					
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						@hasrole('admin')
						<a class="dropdown-item nav-link-dark" role="button" data-toggle="modal" id="createProject" href="#exampleModal">
			 				<i class="fas fa-plus-circle"></i>
			 				<span>Create new Project</span>
			 			</a>
			 			<div class="dropdown-divider"></div>
			 			@endhasrole
			 			<a class="dropdown-item nav-link-dark {{ Request::is('/projects') ? 'active' : '' }}" role="tablist" href="{{ url('/projects') }}">
			 				<span><i class="fas fa-cube"></i> View projects</span>
			 			</a>
					</div>
				</div>			
			</li>

			@yield('sidebar-item')
			
			<hr class="">          

            <li class="nav-item">
	           <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		           	<i class="fas fa-user-circle fa-fw"></i>
		           	@if(auth()->user())
		           	<span>{{auth()->user()->name}}</span>
		           	@endif
	            </a>
	            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			        <a class="dropdown-item nav-link-dark  {{ Route::currentRouteNamed('/settings') ? 'active' : '' }}" href="{{ url('/settings') }}">
				        <i class="fas fa-cog"></i>
				        Settings
			        </a>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item nav-link-dark" href="{{ url('/login/logout') }}">
			            <i class="fas fa-power-off"></i>
			            Logout
		            </a>
	            </div>
       		</li>  
  			   	
		</ul>
		<div id="content-wrapper">
        	<div class="container-fluid">

         		@yield('breadcrumb')

         		@if(session()->has('errors'))
					<div class="alert alert-success">
						{{ session()->get('errors') }}
					</div>
				@endif

         		@if(session()->has('success'))
					<div class="alert alert-success">
						{{ session()->get('success') }}
					</div>
				@endif
          		@yield('content') 

       		</div> 
       		<footer class="footer">
		 		<div class="footer-copyright text-center py-3">© {{ date("Y") }} Copyright:
					<a href="https://github.com/AitorGarciaM"> AitorGarciaM</a>
	  			</div>
			</footer>      	
		</div>
        	

		<!--Modal-->
		<div class="modal fade" id="exampleModal" tabindex="-1">
			<div class="modal-dialog">

				<!--Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Create new project</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!--form-->
					<form method="post" action="{{ url('/create-project') }}">
						@csrf
					<div class="modal-body">						
						<div class="form-group">
							<label>Project name</label>
							<input class="form-control" type="text" name="name">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control fixed-size" name="description" rows="3"></textarea>
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

		@yield('modals')
		<!--------->
	</div>


	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	 <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
	 @yield('scripts')
</body>
</html>