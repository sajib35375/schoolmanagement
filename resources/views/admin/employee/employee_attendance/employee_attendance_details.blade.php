@extends('admin.admin_master')
@section('admin')



    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Employee Attendance Details</h2>
                    </div>
                    <div class="card-body">
                        <table id="example5" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Id No</th>
                                <th>Date</th>
                                <th>Attend Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $data)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->user->id_no }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ $data->attend_status }}</td>

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
