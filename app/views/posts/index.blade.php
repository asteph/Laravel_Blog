@extends('layouts.master')

@section('content')

    @if (Session::has('successMessage'))
        <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
    @endif
    @foreach($posts as $post)

        <h2>
            <a href="{{{ action('PostsController@show', $post->id) }}}">{{{$post->title}}}</a>
        </h2>

        <p><span class="glyphicon glyphicon-time"></span>  {{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A')}}}  by {{ $post->user->first_name }} {{ $post->user->last_name }}</p>
        <hr>
        <img class="img-responsive" src="{{{$post->img_url}}}" alt="">
        <hr>
        {{-- {{{substr($post->body, 0, 300) . "..."}}} --}}
        <p>{{{Str::words($post->body, 40)}}}</p>
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

