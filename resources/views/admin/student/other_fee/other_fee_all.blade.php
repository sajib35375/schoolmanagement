@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Student Other Fee View</h3>
                        <a style="float: right;" class="btn btn-primary" href="{{ route('other.fee.add') }}">Add Student Fee</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Class Name</th>
                                    <th>Year Name</th>
                                    <th>Fee Name</th>
                                    <th>Fee Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($other_fee as $data)

                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->class->name }}</td>
                                        <td>{{ $data->year->year_name }}</td>
                                        <td>{{ $data->fee_name }}</td>
                                        <td>{{ $data->fee_amount }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('other.fee.edit',$data->id) }}">Edit</a>
                                            <a id="delete" class="btn btn-danger" href="{{ route('other.fee.delete',$data->id) }}">Delete</a>
                                        </td>
                                    </tr>

                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Class Name</th>
                                    <th>Year Name</th>
                                    <th>Fee Name</th>
                                    <th>Fee Amount</th>
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
