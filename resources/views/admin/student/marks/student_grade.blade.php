@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Student Grade Table</h3>
                        <a style="float: right;" class="btn btn-primary" href="{{ route('add.new.grade') }}">Grade Add</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">



                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Grade Name</th>
                                    <th>Grade Point</th>
                                    <th>Start Marks</th>
                                    <th>End Marks</th>
                                    <th>Point Range</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($all_grade as $data)

                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->grade_name }}</td>
                                        <td>{{ $data->grade_point }}</td>
                                        <td>{{ $data->start_marks }}</td>
                                        <td>{{ $data->end_marks }}</td>
                                        <td>{{ $data->start_point }} - {{ $data->end_point }}</td>
                                        <td>{{ $data->remarks }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('edit.grade',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                            <a id="delete" class="btn btn-danger btn-sm" href="{{ route('delete.grade',$data->id) }}"><i class="fa fa-trash"></i></a>

                                        </td>

                                    </tr>

                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Grade Name</th>
                                    <th>Grade Point</th>
                                    <th>Start Marks</th>
                                    <th>End Marks</th>
                                    <th>Point Range</th>
                                    <th>Remarks</th>
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
