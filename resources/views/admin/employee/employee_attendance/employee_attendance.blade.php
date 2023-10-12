@extends('admin.admin_master')
@section('admin')



    <div class="wrap my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Employee Attendance History</h2>
                        <a class="btn btn-primary" style="float:right;" href="{{ route('add.attendance') }}">Add Attendance</a>
                    </div>
                    <div class="card-body">
                        <table id="example5" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_data as $data)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('edit.attendance',$data->date) }}"><i class="fa fa-pencil"></i></a>
                                        <a  class="btn btn-warning" href="{{ route('employee.attendance.details',$data->date) }}">Details</a>
                                    </td>
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
