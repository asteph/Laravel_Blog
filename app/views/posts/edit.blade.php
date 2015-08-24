@extends('layouts.master')

@section('content')

	{{-- show errors in alert box --}}

	@if($errors->has())

		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif	
	{{ Form::open(array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}
	{{-- <form method="POST" action="{{{action('PostsController@store')}}}"> --}}
	  <div class="form-group @if($errors->has('title')) has-error @endif">
	    <label class="control-label" for="title">Title</label>
	    <input type="text" class="form-control" id="title" name="title" value="{{{ $post->title}}}">
	  </div>
	  <div class="form-group @if($errors->has('body')) has-error @endif">
	    <label class="control-label" for="body">Blog Content</label>
	    <textarea class="form-control" id="body" name="body" rows="20" >{{{ $post->body }}}</textarea>
	  </div>
	  {{-- TODO: Doesn't work yet, use from adlister to upload photo as well as catch img url UPDATE: PostsController--}}
	  {{-- <div class="form-group">
	    <label for="img_url">Image</label>
	    <input type="file" value="img_url" id="img_url">
	    <p class="help-block">Post picture for blog post.</p>
	  </div> --}}
	  <button type="submit" class="btn btn-primary">Submit</button>
	{{-- </form> --}}
	{{ Form::close() }}
@stop