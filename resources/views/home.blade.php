@extends('layouts.main_layout')

@section('content')

	@if(session('success'))
		<div class="alert alert-success">
			<h2>{{ session('success') }}</h2>
		</div>
	@endif

	<h1>Home page</h1>

@endsection