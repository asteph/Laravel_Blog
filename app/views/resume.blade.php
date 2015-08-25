@extends('layouts.master')

@section('content')
	<p>Resume goes here.</p>
@stop
{{-- PUT IN ROUTES FOR THIS TO WORK
Route::get('/rolldice/{guess}', function($guess)
{
	$data = array('guess' => $guess);
	return View::make('roll-dice')->with($data);
}); --}}