@extends('layouts.master')

@section('content')

    @foreach($posts as $post)

        <h2>
            <a href="{{{ action('PostsController@show', $post->id) }}}">{{{$post->title}}}</a>
        </h2>

        <p><span class="glyphicon glyphicon-time"></span> Posted {{{$post->created_at}}}</p>
        <hr>
        <img class="img-responsive" src="{{{$post->img_url}}}" alt="">
        <hr>
        <p>{{{substr($post->body, 0, 300) . "..."}}}</p>
        <a class="btn btn-primary" href="{{{ action('PostsController@show', $post->id) }}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>

    @endforeach

    {{ $posts->links() }}

{{--         <!-- Pager -->
        <ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul> --}}
    
@stop