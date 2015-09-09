@extends('layouts.master')

@section('content')
<!-- Blog Entries Column -->
<div class="row" ng-app="blog">
    <div class="col-md-12" ng-controller="ManagePostsController">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="name">Bob</td>
                    <td class="email">bob@mail.com</td>
                    <td class="phone">123-123-1234</td>
                    <td>
                        <button class="edit-button action btn btn-default" data-toggle="modal" data-target="#editModal">Edit</button>
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

