<!-- Extend Main layout -->

@extends('layouts.app')

<!-- Add Custom content Section-->
  @section('content')
    <div class="row">
      <div class="dataTable_wrapper">
        <table id="dataTab" class="table table-sm table-hover">
          <thead>
            <tr>
              <th>OM Number</th>
              <th>Project Name</th>
              <th>Funder</th>
              <th>Status</th>
              <th>Team</th>
              <th>Assigned to</th>
              <th>Close Date</th>
              <th>Options</th>
            </tr>
        </thead>
        <tbody>
          @foreach($projects as $project)
          <tr>
          <td>{{$project->project_name}}</td>
          <td>{{$project->date}}</td>
          <td><strong>AH-{{$project->OMNumber}}-OM</strong></td>
          <td class="text-success"><i>{{ $project->sales_stage }}</i></td>
          <td>{{$project->team}}</td>
          <td>{{$project->funder}}</td>
          <td>{{$project->assigned_to}}</td>
          <td>
              <form action="{{ route('projects.destroy', $project->id)}}" method="post">
                  @csrf
                <input name="_method" type="hidden" value="DELETE">
                <div class="btn-group">
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </div>
              </form>
          </td>
          </tr>
          @endforeach   
        </tbody>
          </table>
    </div>
  <br>
<!-- End of page content -->
    @endsection

<!-- Add Custom Page content -->