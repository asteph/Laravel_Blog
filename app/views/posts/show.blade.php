{{-- view for showing single post --}}
@extends('layouts.master')

@section('content')
<!-- Blog Entries Column -->
<div class="row">
<div class="col-md-8">

    <!-- Blog Post -->
    @if (Session::has('successMessage'))
        <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
    @endif
    @if (Session::has('commentSuccessMessage'))
        <div class="alert alert-success">{{{ Session::get('commentSuccessMessage') }}}</div>
    @endif
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

    <!-- Title -->
    <h1>{{{$post->title}}}</h1>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span>  {{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s a')}}} by {{ $post->user->first_name }} {{ $post->user->last_name }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{{$post->img_url}}}" alt="">

    <!-- Modal -->
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Post</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete the post titled {{{$post->title}}}?</p>
          </div>
          <div class="modal-footer">
            {{ Form::open(array('action' => array('PostsController@destroy', $post->id, 'style'=>'display:inline;'), 'method' => 'DELETE')) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-danger" >Delete</button>
            {{ Form::close() }}
          </div>
        </div>

      </div>
    </div>

    <hr>

    <!-- Post Content -->
    <p class="lead">{{Str::words($post->body, 40)}}</p>
    {{-- start normal text after preview shown in index --}}
    <p>{{substr(Post::renderBody($post->body), strlen(Str::words($post->body, 40)) )}}</p>
    <p>
        <strong>Tags:</strong>
        @foreach ($post->tags as $tagInfo)
            {{-- change href to go to url with this tag id --}}
            <a href="?tag={{{$tagInfo->id}}}">{{$tagInfo->name}}</a>
        @endforeach
    </p>
    {{-- Check to make sure only author of post sees 'edit' and 'delete' buttons --}}
    @if ((Auth::check() && Auth::user()->id == $post->user_id) || Auth::id() == 1) 
        <p>
            <a class="btn btn-primary" href="{{{ action('PostsController@edit', $post->id) }}}"><span class="glyphicon glyphicon-pencil"></span></a>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editModal"><span class="glyphicon glyphicon-trash"></span></button>
        </p>
    @endif


    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        {{ Form::open(array('action' => ['PostsController@storeComment', $post->id] )) }}
            <div class="form-group">
                <textarea name="comment" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        {{ Form::close() }}
    </div>


    <!-- Posted Comments -->
    @forelse($post->comments as $comment)

        <!-- Comment -->
        <div class="media">
            {{-- FOR A PROFILE PICTURE --}}
            {{-- <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a> --}}
            <div class="media-body">
                <h4 class="media-heading">{{{$comment->user->first_name}}} {{{$comment->user->last_name}}}
                    <small>{{{$comment->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s a')}}}</small>
                </h4>
                {{Comment::renderComment($comment->comment)}}
                @if ((Auth::check() && Auth::user()->id == $comment->user->id) || Auth::id() == 1)
                    {{ Form::open(array('action' => array('PostsController@destroyComment', $comment->id), 'method' => 'DELETE')) }}
                        <button class="btn btn-danger" >Delete</button>
                    {{ Form::close() }}
                @endif
            </div>
        </div>

    @empty
    @endforelse
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
                        {{-- populate with most popular tags in post_tag table --}}
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



