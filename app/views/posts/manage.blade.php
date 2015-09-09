@extends('layouts.master')

@section('content')
<!-- Blog Entries Column -->
<div class="row" ng-app="blog">
    <div class="col-md-12">
        <table class="table table-striped" ng-controller="ManagePostsController">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date posted</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="post in posts">
                    <td>@{{ post.title }}</td>
                    <td>@{{ post.user.first_name }} @{{ post.user.last_name }}</td>
                    <td>@{{ post.created_at.date }}</td>
                    <td>
                        <button class="remove-button action btn btn-danger">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>


    {{-- col-md-12 close --}}
    </div>
</div>
<!-- /.row -->
@stop 

@section('script')
    <script type="text/javascript" src="/js/angular.min.js"></script>
    <script type="text/javascript" src="/js/blog.js"></script>
@stop

