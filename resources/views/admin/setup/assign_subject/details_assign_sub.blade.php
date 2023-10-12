@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="wrap mt-10" style="margin: 25px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Assign Subject Details</h2>
                    <h5>Class Name : {{ $assign_class->class->name }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Subject Name</th>
                                <th>Full Marks</th>
                                <th>Pass Marks</th>
                                <th>Subjective Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assign_sub as $sub)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $sub->subject->subject }}</td>
                                <td>{{ $sub->full_mark }}</td>
                                <td>{{ $sub->pass_mark }}</td>
                                <td>{{ $sub->subjective_mark }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
