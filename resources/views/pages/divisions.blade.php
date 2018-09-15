@if($divisions->count()<1)
    <p>No divisions found</p>
    @else
    <div class="dataTable_wrapper">
        <table class="table table-sm  table-stripped">
            <thead><tr><th>Name</th><th>Actions</th></tr><thead>
            @foreach($divisions as $division)
                <tbody>
                    <tr>
                        <td>{{$division->divisionname}}</td>
                        <td>
                            <span class='fa fa-eye viewdivision' id="{{$division->id}}"></span>
                            <span class='fa fa-edit editdivision' id="{{$division->id}}"></span>
                            <span class='fa fa-trash danger' id="{{$division->id}}"></span>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endif