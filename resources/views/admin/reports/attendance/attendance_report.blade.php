@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="my-5" style="margin: 25px;">
        <div class="card">
            <div class="card-header">
                <h2>Attendance View</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('attendance.report.pdf') }}" method="GET" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Employees</label>
                           <select class="form-control" name="employee_id" id="employee_id">
                            <option value="">Select</option>
                            @foreach ($all_employee as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach

                           </select>
                        </div>

                        <div class="col-md-4">
                            <label for="">Date</label>
                            <input name="date" class="form-control" type="date">
                        </div>
                        <div class="col-md-4 my-5" style="padding-top: 20px;">
                            <input id="btn" value="Search"  class="btn btn-primary" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
