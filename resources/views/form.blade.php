@extends('layouts.main_layout')

@section('content')

	<h1>Add Post</h1>

	<form action="{{ route('add_post') }}" method="post" enctype="multipart/form-data">
		@csrf

		<input type="hidden" name="user_name" value="{{ Auth::user()->name }}">

	   <div class="form-group">
	    <label for="title">Image</label>
	    <input type="file" name="image" class="form-control" id="title" placeholder="Chose image">

	    @error('image')
	    	<div class="alert alert-danger">
	    		{{ $message }}
	    	</div>
	    @enderror

	  </div>
	  <div class="form-group">
	    <label for="title">Title</label>
	    <input type="text" name="title" class="form-control" id="title" >
	  </div>

	  @error('title')
    	<div class="alert alert-danger">
    		{{ $message }}
    	</div>
    @enderror

	  <div class="form-group">
	    <label for="description">Description</label>
	    <input type="text" name="description" class="form-control" id="description">
	  </div>

	  @error('description')
    	<div class="alert alert-danger">
    		{{ $message }}
    	</div>
    @enderror

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>

@endsection