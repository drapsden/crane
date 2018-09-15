<!-- Extend Main layout -->

@extends('layouts.app')

<!-- Add Custom content Section-->

    @section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Start date:</label><br>
                            <input type="date" name="starts" value="" class="form-control">
                        <label>End date:</label><br>
                            <input type="date" name="ends" value="" class="form-control">                          
                        <label>End date:</label><br>                      
                            <select type="text" name="sortby" class="form-control">
                                <option value="">Team</option>
                                <option value="">Status</option>
                                <option value="">Country</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
       
<!-- End of page content -->
    @endsection

<!-- Add Custom Page content -->