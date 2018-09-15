<!-- Including the navbars and  Main layout -->

@extends('layouts.app')

<!-- Custom content Section-->

  @section('content')
  <div class="row">
      <div class="col-md-4">
        <div class="card shadow">
          <div class="card-header">Project Deliverables <button type="button" class="btn btn-sm btn-outline-danger" style="float:right;" data-toggle="modal" data-target="#newDeliverable"><span class="fa fa-plus"></span> Add</button></div>
          <div class="progress">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 20%;">
                Step 1 of 5
              </div>
                  </div>
                  <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-initiation-tab" data-toggle="tab" href="#nav-initiation" role="tab" aria-controls="nav-initiation" aria-selected="true">Initiation</a>
                        <a class="nav-item nav-link" id="nav-planning-tab" data-toggle="tab" href="#nav-planning" role="tab" aria-controls="nav-planning" aria-selected="false">Planning</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Execution</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Control</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Completion</a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-initiation" role="tabpanel" aria-labelledby="nav-initiation-tab">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>
                                Name
                              </th>
                              <th>
                                Status
                              </th>
                              <th>
                              Actions
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                Initiation
                              </td>
                              <td>
                                  Active  
                              </td>
                              <td>
                                  <span class='fa fa-edit editDel' id=""></span>
                                  <span class='fa fa-trash text-danger  editDel' id=""></span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="nav-planning" role="tabpanel" aria-labelledby="nav-planning-tab">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th>
                                    Name
                                  </th>
                                  <th>
                                    Status
                                  </th>
                                  <th>
                                  Actions
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    Planning
                                  </td>
                                  <td>
                                      Active  
                                  </td>
                                  <td>
                                      <span class='fa fa-edit editDel' id=""></span>
                                      <span class='fa fa-trash text-danger  editDel' id=""></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                      </div>
                      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th>
                                    Name
                                  </th>
                                  <th>
                                    Status
                                  </th>
                                  <th>
                                  Actions
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    Execution
                                  </td>
                                  <td>
                                      Active  
                                  </td>
                                  <td>
                                      <span class='fa fa-edit editDel' id=""></span>
                                      <span class='fa fa-trash text-danger  editDel' id=""></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                      </div>
                      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th>
                                    Name
                                  </th>
                                  <th>
                                    Status
                                  </th>
                                  <th>
                                  Actions
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                      Herman Beck
                                  </td>
                                  <td>
                                      Active  
                                  </td>
                                  <td>
                                      <span class='fa fa-edit editDel' id=""></span>
                                      <span class='fa fa-trash text-danger  editDel' id=""></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                      </div>
                      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th>
                                    Name
                                  </th>
                                  <th>
                                    Status
                                  </th>
                                  <th>
                                  Actions
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                      Herman Beck
                                  </td>
                                  <td>
                                      Active  
                                  </td>
                                  <td>
                                      <span class='fa fa-edit editDel' id=""></span>
                                      <span class='fa fa-trash text-danger  editDel' id=""></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                      </div>
                    </div>
        </div>  
      </div>
      <div class="col-md-4">
          <div class="card shadow">
          <div class="card-header">
                Suppot Staff
            </div>
            <div class="card-body">

            </div>                   
          </div>
        </div>
      <div class="col-md-4">
        <div class="card shadow">
        <div class="card-header">
              Associates
          </div>
          <div class="card-body">
              <table class="table">
                  <thead>
                    <tr>
                      <th>
                        Name
                      </th>
                      <th>
                        Contact
                      </th>
                      <th>
                        Enrolled
                      </th>
                      <th>
                      Status
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                          Herman Beck
                      </td>
                      <td>
                        +256785120145
                      </td>
                      <td>
                        May 15, 2019
                      </td>
                      <td>
                          Active
                      </td>
                    </tr>
                  </tbody>
                </table>
          </div>
          </div>
        </div>
      </div>
  <br>
  <div class="row">
        </div>
<!-- End of page content -->
  @endsection

<!-- Add Custom Page content -->