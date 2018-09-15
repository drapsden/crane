<!-- Extend Main layout -->

@extends('layouts.app')

<!-- Add Custom content Section-->

    @section('content')
    <div class="row">
            <div class="col-md-12">
              <div class="card-header">
                  <strong>Peding Approvals</strong>
                </div>
                <br>
                    <div class="row">
                        <div class="col-md-4">
                          <h6 class="card-header bg-success text-white">
                              Leave Requests
                              <i class="far fa-calendar-alt" aria-hidden="true" style="float:right;"></i>
                          </h6>
                            <div class="card-body">
                                <table class="table table-sm  table-hover table-responsive">
                                    @if($leaves->count()<1)
                                    <p>No leaves found</p>
                                    @else
                                        <thead>
                                            <tr>
                                                <th>Requested</th><th>Starting</th><th>Ending</th><th>Duration</th><th>Actions</th>
                                            </tr>
                                        <thead>
                                        @foreach($leaves as $leave)
                                        <tbody>
                                            <tr>
                                                <td>{{$leave->startdate}}</td>
                                                <td>{{$leave->startdate}}</td>
                                                <td>{{$leave->enddate}}</td>
                                                <td>{{$leave->duration}} Days</td>
                                                <td>
                                                    <span class='fa fa-thumbs-up acceptLeave text-success' id="{{$leave->id}}"></span>
                                                    <span class='fa fa-thumbs-down denyLeave text-danger' id="{{$leave->id}}"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    @endif
                                </table>
                            </div>

                        </div>
                        <div class="col-md-4">
                                <h6 class="card-header bg-danger text-white">
                                  Meats
                                  <i class="far fa-clipboard" aria-hidden="true" style="float:right;"></i>
                                </h6>
                              <div class="card-body" id="meatsBody">
                                    @if(count($meats)>0)
                                    <table class="table table-sm table-responsive table-hover">
                                        <thead>
                                            <tr>
                                            <th scope="col">Action</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Project</th>
                                            <th scope="col">Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($meats as $meat)
                                            <tr>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                <h4>No records found</h4>
                                @endif
                              </div>
                          </div>
                        <div class="col-md-4">
                          <div class="card shadow">
                              <div class="card-header">
                                Notifications
                                <i class="far fa-bell text-danger" aria-hidden="true" style="float:right;"></i>
                              </div>
                            <div class="card-body" id="">
                            </div>
                          </div>
                        </div>
                      </div>
              </div>  
            </div>
          <br>
        <div class="row">
            <div class="col-md-12">
              <div class="card-header">
                  <strong>Organisational plan</strong>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header">
                              Divisions
                              <i class="fas fa-cog" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addDivs"></i>
                            </div>
                          <div class="card-body" id="divsBody">
                              @if($divisions->count()<1)
                              <p>No divisions found</p>
                              @else
                              <div class="dataTable_wrapper">
                                  <table class="table table-sm  table-hover">
                                      @foreach($divisions as $division)
                                          <tbody>
                                              <tr>
                                                  <td>{{$division->divname}}</td>
                                                  <td>
                                                      <span class='fa fa-edit editdiv' id="{{$division->id}}"></span>
                                                      <span class='fa fa-trash text-danger  delDiv' id="{{$division->id}}"></span>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      @endforeach
                                  </table>
                              </div>
                          @endif
                          </div>
                        </div>
                      </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                          <div class="card-header">
                            Teams
                            <i class="fas fa-cog" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addTeams"></i>
                          </div>
                            <div class="card-body" id="teamsTable">
                            @if($teams->count()<1)
                                <p>No teams found</p>
                            @else
                                <div class="dataTable_wrapper">
                                    <table class="table table-sm  table-hover">
                                        @foreach($teams as $team)
                                        <tbody>
                                            <tr>
                                                <td>{{$team->teamname}}</td>
                                                <td>
                                                    <span class='fa fa-edit editTeam' id="{{$team->id}}"></span>
                                                    <span class='fa fa-trash text-danger delTeam' id="{{$team->id}}"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table> 
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                        <div class="card-header">
                            User Roles
                            <i class="fas fa-cog" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addRole"></i>
                          </div>
                          <div class="card-body" id="rolesBody">
                                @if($roles->count()<1)
                                <p>No User roles found</p>
                            @else
                                <table class="table table-sm  table-hover">
                                        @foreach($roles as $role)
                                        <tbody>
                                            <tr>
                                                <td>{{$role->rolename}}</td>
                                                <td>{{$role->roledesc}}</td>
                                                <td>
                                                    <span class='fa fa-edit editRole' id="{{$role->id}}"></span>
                                                    <span class='fa fa-trash delRole text-danger' id="{{$role->id}}"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            @endif
                          </div>
                        </div>  
                      </div>
                  </div>
                </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                      Service lines
                      <i class="fas fa-cog" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#serviceLine"></i>
                    </div>
                  <div class="card-body">
                    @if($servicelines->count()<1)
                    <p>No Servicelines found</p>
                @else
                    <div class="dataTable_wrapper">
                        <table class="table table-sm  table-hover">
                            @foreach($servicelines as $serviceline)
                            <tbody>
                                <tr>
                                    <td>{{$serviceline->servicename}}</td>
                                    <td>{{$serviceline->servicecode}}</td>
                                    <td>
                                        <span class='fa fa-edit editService' id="{{$serviceline->id}}"></span>
                                        <span class='fa fa-trash delService text-danger' id="{{$serviceline->id}}"></span>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                @endif
                  </div>
                </div>
              </div>
            <div class="col-md-4">
              <div class="card shadow">
              <div class="card-header">
                  Public Holidays
                  <i class="fas fa-cog" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#publicDays"></i>
                </div>
                <div class="card-body" id="holiBody">
                    <table class="table table-sm  table-hover">
                        @if($holidays->count()<1)
                        <p>No teams found</p>
                        @else
                            @foreach($holidays as $holiday)
                            <tbody>
                                <tr>
                                    <td>{{$holiday->holiday}}</td><td>{{$holiday->holimonth}} {{$holiday->holidate}}</td>
                                    <td>
                                        <span class='fa fa-edit editHoliday' id="{{$holiday->id}}"></span>
                                        <span class='fa fa-trash text-danger delHoliday' id="{{$holiday->id}}"></span>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        @endif
                    </table>
                </div>
              </div>  
            </div>
            <div class="col-md-4">
              <div class="card shadow">
                  <div class="card-header">
                    Leave Settings
                    <i class="fas fa-cog" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#leaveSetting"></i>
                  </div>
                <div class="card-body">
    
                </div>
            </div>
        </div>
    </div>
<!-- End of page content -->
    @endsection
<!-- Add Custom Page content -->