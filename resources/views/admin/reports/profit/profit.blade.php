@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="my-5" style="margin: 25px;">
        <div class="card">
            <div class="card-header">
                <h2>Monthly/Yearly Profit</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('profit.view') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input name="start_date" class="form-control" type="date">
                        </div>
                        <div class="col-md-4">
                            <input name="end_date" class="form-control" type="date">
                        </div>
                        <div class="col-md-4">
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
                                        <th>Employee Salary</th>
                                        <th>Student Fee</th>
                                        <th>Other Fee</th>
                                        <th>Other Cost</th>
                                        <th>Total Cost</th>
                                        <th>Total Profit</th>
                                        <th>Action</th>
                                    </tr>
                            </thead>
                            <tbody>
                                    {{-- @dd($edate); --}}
                                    <tr>
                                        <td>{{ $employee_salary }}</td>
                                        <td>{{ $student_fee }}</td>
                                        <td>{{ $other_fee }}</td>
                                        <td>{{ $other_cost }}</td>
                                        <td>{{ $total_cost }}</td>
                                        <td>{{ $total_profit }}</td>
                                        <td>
                                            @if ($start_date && $end_date && $sdate && $edate)
                                            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('profit.pdf.view',[$start_date,$end_date,$sdate,$edate]) }}">Pay Slip</a>
                                            @endif

                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
