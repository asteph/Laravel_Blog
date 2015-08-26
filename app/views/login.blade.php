{{-- view for showing login form --}}
@extends('layouts.master')

@section('content')
	@if (Session::has('errorMessage'))
	    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif
	{{ Form::open(array('action' => 'HomeController@doLogin')) }}
        <div class="form-group">
            <label class="control-label" for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{{ Input::old('email') }}}">
        </div>
        <div class="form-group">
            <label class="control-label" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{{ Input::old('password') }}}">
        </div>
        <button class="btn btn-primary" >Login</button>
	{{ Form::close() }}
@stop