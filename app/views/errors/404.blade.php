{{-- view for showing missing page error --}}
@extends('layouts.master')

@section('content')
	<style>
	.center{
		margin-right: auto;
		margin-left: auto;
		text-align: center;
	}
	</style>
	<h1 class='text-center'>Uh Oh! (404 Error)</h1>
	<img class="center img-responsive" src="https://css-tricks.com/images/404.jpg" alt="404 error image">

@stop
