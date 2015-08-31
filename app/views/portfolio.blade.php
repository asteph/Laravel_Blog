{{-- view for showing codeup projects --}}
@extends('layouts.master')

@section('content')
<h1>PROJECTS</h1>
<hr>
<p>
	Projects created during my time at <a href="http://codeup.com/">Codeup</a>.
</p>
<h2>SIMPLE SIMON</h2>
<p style="text-indent: 50px">
	Simple Simon is a game with 4 colors that play randomly and continue to add one color to the sequence at each turn. You must then select the correct order back to the game for as many rounds as you can. Created using jQuery.
</p>
<iframe style="width: 80%; height: 600px; margin: 20px 10% 20px 10%" src="http://blog.dev/simplesimon"></iframe>
@stop