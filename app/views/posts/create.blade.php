@extends('layouts.master')

@section('content')
	
	<form action="{{{ action('PostsController@store') }}}" method="POST" accept-charset="utf-8">
		<div class="row">
			<div class="large-12 columns">
				<label>Title
					<input type="text" name="title" value="{{{ Input::old('title') }}}"placeholder="Blog Post Title" />
				</label>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">
				<label>Body
					<textarea name="body" placeholder="Blog Post Content">{{{ Input::old('body') }}}</textarea>
				</label>
			</div>
		</div>
		<input type="submit" class="button">
	</form>

@stop