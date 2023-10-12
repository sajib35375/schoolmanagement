@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>







    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Registration Table</h3>
                        <a style="float: right;" class="btn btn-primary" href="{{ route('add.employee') }}">Employee Add</a>
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
                                    <th>Salary</th>
                                    <th>Join Date</th>
                                    @if(Auth::user()->role == 'Admin')
                                    <th>Code</th>
                                    @endif
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($all_data as $data)

                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->name ?? '' }}</td>
                                        <td>{{ $data->id_no ?? '' }}</td>
                                        <td>{{ $data->salary ?? '' }}</td>
                                        <td>{{ $data->join_date ?? '' }}</td>
                                        @if(Auth::user()->role == 'Admin')
                                        <td>{{ $data->code ?? '' }}</td>
                                        @endif
                                        <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/images/employee/{{ $data->image ?? '' }}" alt=""></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('edit.employee',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                            <a id="delete" class="btn btn-danger btn-sm" href="{{ route('delete.employee',$data->id) }}"><i class="fa fa-trash"></i></a>
                                            <a target="_blank" class="btn btn-warning btn-sm" href="{{ route('employee.pdf',$data->id) }}"><i class="fa fa-file-pdf-o"></i></a>
                                        </td>

                                    </tr>

                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>Id No</th>
                                    <th>Salary</th>
                                    <th>Join Date</th>
                                    @if(Auth::user()->role == 'Admin')
                                        <th>Code</th>
                                    @endif
                                    <th>Photo</th>
                                    <th>Action</th>
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
