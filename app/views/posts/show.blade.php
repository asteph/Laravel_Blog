{{-- view for showing single post --}}
@extends('layouts.master')

@section('content')

    <!-- Blog Post -->
    @if (Session::has('successMessage'))
        <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
    @endif
    @if (Session::has('errorMessage'))
        <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
    @endif

    <!-- Title -->
    <h1>{{{$post->title}}}</h1>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span>  {{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A')}}} by {{ $post->user->first_name }} {{ $post->user->last_name }}</p>

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
    <p class="lead">{{{Str::words($post->body, 40)}}}</p>
    {{-- start normal text after preview shown in index --}}
    <p>{{{substr($post->body, strlen(Str::words($post->body, 40)) )}}}</p>
    <br>
    {{-- Check to make sure only author of post sees 'edit' and 'delete' buttons --}}
    @if (Auth::check() && Auth::user()->id == $post->user_id) 
        <a class="btn btn-primary" href="{{{ action('PostsController@edit', $post->id) }}}"><span class="glyphicon glyphicon-pencil"></span></a>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editModal"><span class="glyphicon glyphicon-trash"></span></button>
    @endif


    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="comment">Submit</button>;
        </form>
    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>

@stop



