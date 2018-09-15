<!-- Extend Main layout -->

@extends('layouts.app')

<!-- Add Custom content Section-->

    @section('content')
<p><a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#addUser">Add users</a></p>
    @if(count($users)>0)
    <div class="dataTable_wrapper">
        <table id="users_table" class="table table-sm table-striped table-responsive dat">
            <thead>
                <tr>
                    <th>Fullname</th><th>Email</th><th>Phone</th><th>Team</th><th>Team</th><th>Reports To</th><th>Status</th><th>Actions</th>
                </tr>
            <thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->firstname}} {{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->mobilePhone}}</td>
                <td>{{$user->team}}</td>
                <td>{{$user->title}}</td>
                <td>{{$user->reportsTo}}</td>
                <td>{{$user->user_status}}</td>
                <td>
                    <span class='fa fa-edit edituser' id="{{$user->id}}" title="Edit"></span>
                    <span class='fa fa-trash deluser text-danger' id="{{$user->id}}" title="Delete"></span>
                    <span class='fa fa-database assignTask text-success' id="{{$user->id}}" title="Assign Task"></span>
                    <span class='fa fa-indent assignTask text-dark' id="{{$user->id}}" title="Change Team"></span>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif
<!-- End of page content -->
    @endsection

<!-- Add Custom Page content -->