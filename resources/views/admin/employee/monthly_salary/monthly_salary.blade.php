@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="my-5" style="margin: 25px;">
        <div class="card">
            <div class="card-header">
                <h2>Employee Monthly Salary </h2>
            </div>
            <div class="card-body">
                <form action="{{ route('monthly.salary') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input name="date" class="form-control" type="date">
                        </div>
                        <div class="col-md-6">
                            <input id="btn" value="Search" class="btn btn-primary" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Search Result</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Id No</th>
                                        <th>Basic Salary</th>
                                        <th>This Month Salary</th>
                                        <th>Action</th>
                                    </tr>
                            </thead>
                            <tbody>

                            @foreach($all_data as $data)

                                @php

                                           $salary = $data->user->salary ?? '';
                                           $id = $data->user->id ?? '';
                                           $count_attend = App\Models\EmployeeAttendance::where('employee_id',$id)->where('date','like',"%$date%")->where('attend_status','Absent')->count();
                                           $perDaySalary = $salary/30;
                                           $total_absent = $count_attend ?? '';
                                           $salaryCut = $total_absent*$perDaySalary;
                                           $monthly_salary = round($salary - $salaryCut);


                                @endphp
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->user->id_no }}</td>
                                        <td>{{ $data->user->salary }}</td>
                                        <td>{{ $monthly_salary }}</td>
                                        <td>
                                            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('monthly.pay.slip.employee',[$data->employee_id,$date]) }}">pay slip</a>
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
