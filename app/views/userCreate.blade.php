{{-- view for showing form to create a user--}}
@extends('layouts.master')

@section('content')
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
    <h2>Create a New User</h2>
	{{ Form::open(array('action' => 'HomeController@userCreate')) }}
        <div class="form-group">
            <label class="control-label" for="first_name">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{{ Input::old('first_name') }}}">
        </div>
         <div class="form-group">
            <label class="control-label" for="last_name">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{{ Input::old('last_name') }}}">
        </div>
         <div class="form-group">
            <label class="control-label" for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{{ Input::old('email') }}}">
        </div>
        <div class="form-group">
            <label class="control-label" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label class="control-label" for="confirm_password">Confirm password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        </div>
        <button class="btn btn-primary">Create</button>
	{{ Form::close() }}
@stop