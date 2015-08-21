@extends('layouts.master')

@section('content')
        
        @foreach($posts as $post)
            <article>

                <h3><a href="#">{{{$post->title}}}</a></h3>
                <h6>Written by <a href="#">Alissa Stephens</a> on {{{$post->created_at}}}.</h6>

                <div class="row">
                  
                    <div class="large-12 columns">
                        {{-- http://placehold.it/690x240&text=[img] --}}
                        {{-- "http://lorempixel.com/690/240/cats/" --}}
                        <img src="{{{$post->img_url}}}"/>
                    </div>
                </div>

                <p>{{{$post->body}}}</p>

            </article>

            <hr/>
            <br>
        @endforeach
    

    
@stop