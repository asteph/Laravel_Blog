@extends('layouts.master')

@section('content')
<!-- Blog Entries Column -->
<div class="row" ng-app="blog" ng-controller="ManagePostsController">
    <div class="col-md-12">
        <h2>Manage Blog Posts</h2>
        <table class="table table-striped">
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
                    <td><a href="/posts/@{{ post.id }}">@{{ post.title }}</a></td>
                    <td>@{{ post.user.first_name }} @{{ post.user.last_name }}</td>
                    <td>@{{ post.created_at.date }}</td>
                    <td>
                        <button class="edit-button action btn btn-default" ng-click='select($index)' data-toggle="modal" data-target="#editModal">Edit</button>
                        <button class="remove-button action btn btn-danger" ng-click="deletePost($index)">Remove</button>
                    </td>
                    {{-- TODO:Add edit button that brings up modal to edit post and update using a PUT request then close modal, show changes on page in real time as well --}}
                </tr>
            </tbody>
        </table>
        <code>
            @{{ posts | json }}
        </code>
        <!-- modal for editing contact information -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="editModalLabel">Edit Blog Post Info</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="post-title" class="control-label">Title</label>
                                <input type="text" class="form-control" id="post-title" ng-model="posts[selectedPost].title">
                            </div>
                            <div class="form-group">
                                <label for="first-name" class="control-label">First name</label>
                                <input type="text" class="form-control" id="first-name" ng-model="posts[selectedPost].user.first_name">
                            </div>
                            <div class="form-group">
                                <label for="last-name" class="control-label">Last name</label>
                                <input type="text" class="form-control" id="last-name" ng-model="posts[selectedPost].user.last_name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="save-button" class="btn btn-primary" ng-click="editContact()" data-dismiss="modal">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>


    {{-- col-md-12 close --}}
    </div>
</div>
<!-- /.row -->
@stop 

@section('script')
    <script type="text/javascript" src="/js/angular.min.js"></script>
    <script type="text/javascript" src="/js/blog.js"></script>
@stop

