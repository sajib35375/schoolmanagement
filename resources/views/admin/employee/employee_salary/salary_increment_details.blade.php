@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Salary Table</h3>
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
                                    <th>Previous Salary</th>
                                    <th>Present Salary</th>
                                    <th>Increment Salary</th>
                                    <th>Effected Date</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($all_data as $data)

                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->employee->name ?? '' }}</td>
                                        <td>{{ $data->employee->id_no ?? '' }}</td>
                                        <td>{{ $data->previous_salary ?? '' }}</td>
                                        <td>{{ $data->present_salary ?? '' }}</td>
                                        <td>{{ $data->increment_salary ?? '' }}</td>
                                        <td>{{ $data->effected_salary ?? '' }}</td>
                                    </tr>

                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>Id No</th>
                                    <th>Previous Salary</th>
                                    <th>Present Salary</th>
                                    <th>Increment Salary</th>
                                    <th>Effected Date</th>

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
