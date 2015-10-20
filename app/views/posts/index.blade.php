@extends('layouts.master')

@section('content')
<!-- Blog Entries Column -->
<div class="row">
<div class="col-md-8">

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
{{-- col-md-8 close --}}
</div>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            {{ Form::open(array('action' => array('PostsController@index'), 'role' => 'search', 'method' => 'GET')) }}
                <div class="input-group">
                    <input type="text" class="form-control" name="search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            {{ Form::close() }}
            <!-- /.input-group -->
        </div>


        <!-- Side Widget Well -->
        <div class="well text-center">
            <img id="profile" src="/img/profile.jpg" class="img-responsive center-block img-circle" alt="profile picture">
            <h5>ALISSA STEPHENS</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>

    </div>

</div>
<!-- /.row -->
@stop

