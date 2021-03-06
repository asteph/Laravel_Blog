@extends('layouts.master')

@section('content')
<!-- Blog Entries Column -->
<div class="row">
<div class="col-md-12">

	{{-- show errors in alert box --}}
	@if (Session::has('errorMessage'))
	    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif
	@if($errors->has())

		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif	
	{{ Form::open(array('action' => 'PostsController@store', 'enctype' => "multipart/form-data")) }}
	{{-- <form method="POST" action="{{{action('PostsController@store')}}}"> --}}
	<div class="form-group @if($errors->has('title')) has-error @endif">
		<label class="control-label" for="title">Title</label>
		<input type="text" class="form-control" id="title" name="title" value="{{{ Input::old('title') }}}">
	</div>
	<div class="form-group @if($errors->has('body')) has-error @endif">
		<label class="control-label" for="body">Blog Post Content</label>
		<textarea data-provide="markdown" class="form-control" id="body" name="body" rows="20" >{{{ Input::old('body') }}}</textarea>
	</div>
	<div class="form-group">
		<label for="tags">Tags</label>
		<input type="text" class="form-control" id="tags" name="tags" value="foo,bar,baz">
	</div>
	{{-- Image Upload --}}
	<div class="form-group">
		<label for="img_url">Cover Image</label>
		<input type="file" value="img_url" id="img_url" name="img_url" alt="blog post picture">
		<p class="help-block">Post picture for blog post.</p>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
	{{-- </form> --}}
	{{ Form::close() }}
{{-- close row --}}
</div>
@stop
@section('script')
<script type="text/javascript" src="/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="/js/markdown.js"></script>
<script type="text/javascript" src="/js/to-markdown.js"></script>
{{-- fancy tags --}}
<script src="/js/jquery.tagsinput.js"></script>
<script>
	$("#body").markdown({autofocus:false, savable:false});
	$('#tags').tagsInput();
</script>
@stop