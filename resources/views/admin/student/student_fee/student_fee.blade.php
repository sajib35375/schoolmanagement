@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12" style="display: block; margin: auto;">
                <div class="box box-solid bg-secondary">
                    <div class="box-header">
                        <h4 class="box-title"><strong>Search</strong> Student Fee</h4>
                    </div>

                    <div class="box-body" >

                        <form action="{{ route('student.fee') }}" method="GET">
                            @csrf
                            <div class="row" >
                                <div class="col-md-4">
                                    <label for="">Year Name</label>
                                    <select class="form-control" name="year_id" id="">
                                        <option value="">Select</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Class Name</label>
                                    <select class="form-control" name="class_id" id="">
                                        <option value="">Select</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2" style="padding-top: 20px;">
                                    <input value="Search" class="btn btn-info" type="submit" name="search">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Student Registration Fee</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">



                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>Id No</th>
                                    <th>Phone</th>
                                    <th>Class Name</th>
                                    <th>Original Amount</th>
                                    <th>Discount</th>
                                    <th>Amount</th>
                                    <th>Roll</th>
                                    <th>Year</th>
                                    <th width="100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($all_data as $assign)
                                    @php
                                        $original_amount = $fee_data->amount;
                                        $discount = $assign->discount->discount;
                                        $discount_amount = $discount/100*$original_amount;
                                        $final_amount = $original_amount - $discount_amount;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $assign->student->name }}</td>
                                        <td>{{ $assign->student->id_no }}</td>
                                        <td>{{ $assign->student->phone }}</td>
                                        <td>{{ $assign->class->name }}</td>
                                        <td>{{ $fee_data->amount }} BDT</td>
                                        <td>{{ $assign->discount->discount }} %</td>
                                        <td>{{ $final_amount }} BDT</td>
                                        <td>{{ $assign->role_id }}</td>
                                        <td>{{ $assign->year->year_name }}</td>
                                        <td width="100px">
                                            <a target="_blank" class="btn btn-info btn-sm" href="{{ url('payslip/download',[$assign->student_id,$assign->class_id]) }}">Pay Slip</a>

                                        </td>

                                    </tr>

                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>Id No</th>
                                    <th>Phone</th>
                                    <th>Class Name</th>
                                    <th>Original Amount</th>
                                    <th>Discount</th>
                                    <th>Amount</th>
                                    <th>Roll</th>
                                    <th>Year</th>
                                    <th width="100px">Action</th>
                                </tr>
                                </tfoot>
                            </table>


                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>

@endsection
