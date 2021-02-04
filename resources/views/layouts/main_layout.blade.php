<!DOCTYPE html>
<html>
<head>
	<title>Blog WebSite</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
	  <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
	  <nav class="my-2 my-md-0 mr-md-3">
	    <a class="p-2 text-dark" href="#">Features</a>
	    <a class="p-2 text-dark" href="#">Enterprise</a>
	    <a class="p-2 text-dark" href="#">Support</a>
	    <a class="p-2 text-dark" href="#">Pricing</a>
	  </nav>

		@if (Route::has('login'))
	        <div class="">
	            @auth
	                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
	                <a href="{{ route('form') }}" class="btn btn-outline-success">Add record</a>
	            @else
	                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>

	                @if (Route::has('register'))
	                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
	                @endif
	            @endif
	        </div>
	    @endif

	</div>


	<div class="container">

		@yield('content')

	</div>
	
</body>
</html>