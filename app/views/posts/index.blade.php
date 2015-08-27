@extends('layouts.master')

@section('content')

    @if (Session::has('successMessage'))
        <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
    @endif
    @forelse($posts as $post)

        <h2>
            <a href="{{{ action('PostsController@show', $post->id) }}}">{{{$post->title}}}</a>
        </h2>

        <p>
            <span class="glyphicon glyphicon-time"></span>  {{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A')}}}  by <a href="/?user={{$post->user_id}}">{{ $post->user->first_name }} {{ $post->user->last_name }}</a>
        </p>
        <hr>
        @if(!empty($post->img_url))
            <img class="img-responsive" src="{{{$post->img_url}}}" alt="blog post image">
            <hr>
        @endif
        <p>{{{Str::words($post->body, 40)}}}</p>
        <a class="btn btn-primary" href="{{{ action('PostsController@show', $post->id) }}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
    @empty
        <h3>No articles with this title.</h3>
    @endforelse
    @if(Input::has('user'))
        {{$posts->appends(array('user' => "$post->user_id"))->links()}}
    @elseif(Input::has('search'))
        {{$posts->appends(array('search' => Input::get('search')))->links()}}
    @else
        {{ $posts->links() }}
    @endif
@stop

