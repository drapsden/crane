<!-- Extend Main layout -->

@extends('layouts.app')

<!-- Add Custom content Section-->

    @section('content')
<p><a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#addUser">Add Associates</a></p>
        @if(count($associates)>0)
        <div class="dataTable_wrapper">
            <table id="dataTab" class="table table-sm table-hover">
                <thead><tr><th>Fullname</th><th>Email</th><th>Phone</th><th>Team</th><th>Reports To</th><th>Actions</th></tr><thead>
            @foreach($associates as $associate)
            <tbody><tr>
                <td>{{$associate->name}}</td>
                <td>{{$associate->email}}</td>
                <td>{{$associate->name}}</td>
                <td>{{$associate->name}}</td>
                <td>{{$associate->name}}</td>
                <td>
                    <span class='fa fa-edit editassociate' id="{{$associate->id}}"></span>
                    <span class='fa fa-trash delassociate' id="{{$associate->id}}"></span>
                </td>
            @endforeach
        </tr></tbody></table>
    </div>
        @endif
<!-- End of page content -->
    @endsection

<!-- Add Custom Page content -->