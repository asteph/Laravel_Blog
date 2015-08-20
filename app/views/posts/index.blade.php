@extends('layouts.master')

@section('content')
        {{{$posts}}}
        @foreach($posts as $post)
            <article>

                <h3><a href="#">{{{$post->title}}}</a></h3>
                <h6>Written by <a href="#">Alissa Stephens</a> on {{{$post->created_at}}}.</h6>

                <div class="row">
                  
                    <div class="large-12 columns">
                        <img src="http://placehold.it/690x240&text=[img]"/>
                    </div>
                </div>

                <p>{{{$post->body}}}</p>

            </article>

            <hr/>
        @endforeach
    

    
@stop