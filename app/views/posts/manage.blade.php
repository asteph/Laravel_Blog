@extends('layouts.master')

@section('content')
<!-- Blog Entries Column -->
<div class="row" ng-app="blog">
    <div class="col-md-12">
        <h2>Manage Blog Posts</h2>
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
                        <button class="remove-button action btn btn-danger" ng-click="deletePost($index)">Remove</button>
                    </td>
                    {{-- TODO:Add edit button that brings up modal to edit post and update using a PUT request then close modal, show changes on page in real time as well --}}
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

