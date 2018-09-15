<!-- Extend Main layout -->

@extends('layouts.app')

<!-- Add Custom content Section-->

    @section('content')
    <div class="row">
        <div class="col-md-8">
          <div class="row">
              <div class="col-md-12">
                  <div class="card shadow">
                      <div class="card-header">
                        <h5>Meats</h5>
                      </div>
                      <div class="card-body" id="groupsBody">
                        @if(count($meats)>0)
                          <table class="table table-sm  table-hover dat">
                            <thead>
                                <tr>
                                <th scope="col">Options</th>
                                <th scope="col">Date</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Beneficiary</th>
                                <th scope="col">OM Number</th>
                                <th scope="col">Service Line</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($meats as $meat)
                                <tr>
                                  <td>
                                      <span class='fa fa-edit editMeat' id="{{$meat->id}}" title="Edit Meat"></span>
                                      <span class='fa fa-trash text-danger  delMeat' id="{{$meat->id}}" title="Delete Meat"></span>
                                  </td>
                                  <td>{{$meat->activityDate}}</td>
                                  <td>{{$meat->duration}} Hours</td>
                                  <td>{{$meat->beneficiary}}</td>
                                  <td>{{$meat->OMNumber}}</td>
                                  <td>{{$meat->serviceline}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        @else
                        <h4>No records found</h4>
                        @endif
                      </div>
                    </div>
                  </div>
              </div>
              <br>
          <div class="row">
              <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-header">
                      <h5>Leave Requests</h5>
                    </div>
                    <div class="card-body" id="groupsBody">
                      @if(count($leaves)>0)
                          <table class="table table-sm dat">
                          <thead>
                              <tr>
                              <th scope="col">Leave Type</th>
                              <th scope="col">Starting</th>
                              <th scope="col">Ending</th>
                              <th scope="col">Duration</th>
                              <th scope="col">Status</th>
                              <th scope="col">Modified</th>
                              <th scope="col"></th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($leaves as $leave)
                              <tr>
                                  <td>{{$leave->leaveType}}</td>
                                <td>{{$leave->startdate}}</td>
                                <td>{{$leave->enddate}}</td>
                                <td>{{$leave->duration}} Days</td>
                                <td>{{$leave->status}}</td>
                                <td>{{$leave->startdate}}</td>
                                <td>
                                    <span class='fa fa-edit text-primary editLeave' id="{{$leave->id}}" title="Edit Leave"></span>
                                    <span class='fas fa-times text-danger delLeve' id="{{$leave->id}}" title="Cancel Leave"></span>
                                </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                      @else
                      <h4>No records found</h4>
                      @endif
                    </div>
                  </div>
                </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                      <strong>Logged Time</strong>
                      <i class="far fa-calendar-check" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addMeat"></i>
                    </div>
                  <div class="card-body">
                      <table class="table table-sm">
                          <tr><td class="text-right"><b>{{date('M-Y')}}</b></td><td>{{$fmonth}}</td></tr>
                          <tr><td>Opportunities</td><td><b>{{$woppsum}}</b></td></tr>
                          <tr><td>Administration</td><td><b>{{$adminw}}</b></td></tr>
                          <tr><td>Personal</td><td><b>{{$personalw}}</b></td></tr>
                          <tr><td>Total Worked</td><td><b>{{$worked}}</b></td></tr>
                          <tr class="bg-warning"><td>Hours Lost</td><td><b>{{$lost}}</b></td></tr>
                      </table>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <strong>Absence</strong>
                      <i class="far fa-calendar-check" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addleave"></i>
                    </div>
                  <div class="card-body">
                    <table class="table table-sm">
                      <tr><td>Carried forward</td><td><b>12</b></td></tr>
                    <tr><td>Balance for {{date('Y')}}</td><td><b>12</b></td></tr>
                      <tr><td>Days Booked</td><td><b>12</b></td></tr>
                      <tr><td>Total Balance</td><td><b>12</b></td></tr>
                    </table>
                  </div>
                </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        Your account information
                      <i class="far fa-user-circle" aria-hidden="true" style="float:right;"></i>
                    </div>
                  <div class="card-body">
                      <form class="form-group" id="profileForm" onsubmit="return updateProfile();" autocomplete="off">
                        <div class="row">
                          <div class="col-md-6">
                              <label>Firstname</label>
                              <input type="text" name="firstname" id="firstname" value="" class="form-control form-control-sm" >
                          </div>
                          <div class="col-md-6">
                            <label>Lastname</label>
                            <input type="text" name="lastname" id="lastname" value="" class="form-control form-control-sm">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <label>Mobile Phone</label>
                            <input type="text" name="mobilePhone" id="mobilePhone" value="" class="form-control form-control-sm">
                          </div>
                          <div class="col-md-4">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control form-control-sm">
                            <div id="newpass" class="val_error"></div>
                          </div>
                          <div class="col-md-4">
                            <label>Lastname</label>
                            <input type="text" name="lastname" class="form-control form-control-sm">
                            <div id="newpass" class="val_error"></div>
                          </div>
                        </div>
                          <br>
                        <div style="overflow: auto; padding: 0 0 10px 0">
                          <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Save changes</button>
                          <button type="button" class="btn btn-danger pull-right"data-toggle="modal" data-target="#PasswordModal">
                            <i class="fa fa-lock"></i> Reset Password
                          </button>
                        </div>
                      </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
<!-- End of page content -->
    @endsection

<!-- Add Custom Page content -->