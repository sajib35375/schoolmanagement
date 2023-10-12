@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="my-5" style="margin: 25px;">
        <div class="card">
            <div class="card-header">
                <h2>Add Employee Attendance</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('update.attendance') }}" method="POST">
                    @csrf


                    <input name="update_date" value="{{ $data->date }}" type="hidden">
                    <div class="row">
                        <div class="col-md-6" style="margin-left: 15px;">
                            <label for="">Date</label>
                            <input name="date" value="{{ $data->date }}" class="form-control" type="date">
                        </div>
                    </div>
                    <div class="col-md-12 my-10">
                        <table class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                            <tr>
                                <th width="15%" rowspan="2" class="text-center" style="vertical-align: middle;">SL</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee</th>
                                <th width="40%" colspan="3" class="text-center" style="vertical-align: middle;">Status</th>

                            </tr>
                            <tr>
                                <th class="text-center">Present</th>
                                <th class="text-center">Leave</th>
                                <th class="text-center">Absent</th>
                            </tr>

                            </thead>

                            <tbody>

                            @foreach( $attend as $key => $employee )

                                <input name="employee_id[]" value="{{ $employee->employee_id }}" type="hidden">

                                <tr>
                                    <td rowspan="2" class="text-center" style="vertical-align: middle;">{{ $key+1 }}</td>
                                    <td rowspan="2" class="text-center" style="vertical-align: middle;">{{ $employee->user->name }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="switch-toggle switch-3 switch-candy text-center">

                                            <input {{ $employee->attend_status == 'Present' ? 'checked' : '' }} value="Present" name="attend_status{{ $key }}" type="radio" id="present{{ $key }}" class="radio-col-success">
                                            <label for="present{{ $key }}">Present</label>


                                            <input {{ $employee->attend_status == 'Leave' ? 'checked' : '' }} value="Leave" name="attend_status{{ $key }}" type="radio" id="leave{{ $key }}" class="radio-col-warning">
                                            <label for="leave{{ $key }}">Leave</label>


                                            <input {{ $employee->attend_status == 'Absent' ? 'checked' : '' }} value="Absent" name="attend_status{{ $key }}" type="radio" id="absent{{ $key }}" class="radio-col-danger">
                                            <label for="absent{{ $key }}">Absent</label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <input class="btn btn-success" type="submit">
                    </div>
                </form>

            </div>
        </div>
    </div>



@endsection
