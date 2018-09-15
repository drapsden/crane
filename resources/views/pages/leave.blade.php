<div class="dataTable_wrapper">
    <table class="table table-sm  table-hover">
        @if($leaves->count()<1)
        <p>No leaves found</p>
        @else
            <thead><tr><th>Starting</th><th>Ending</th><th>Duration</th><th>Actions</th></tr><thead>
            @foreach($leaves as $leave)
            <tbody>
                <tr>
                    <td>{{$leave->startdate}}</td>
                    <td>{{$leave->enddate}}</td>
                    <td>@ days</td>
                    <td>
                        <span class='fa fa-thumbs-up acceptLeave text-success' id="{{$leave->id}}"></span>
                        <span class='fa fa-thumbs-down denyLeave text-danger' id="{{$leave->id}}"></span>
                    </td>
                </tr>
            </tbody>
            @endforeach
            Pagination
            {{-- {{$leaves->links()}} --}}
        @endif
    </table>
    </div>