@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="my-5" style="margin: 25px;">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Assign Subject</h3>
                    <a style="float: right;" class="btn btn-primary" href="{{ route('add.assign_subject') }}">Add Subject</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Class Name</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($assignSub as $assign)

                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $assign->class->name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('edit.assign_subject',$assign->class_id) }}">Edit</a>
                                    <a id="delete" class="btn btn-danger" href="{{ route('delete.assign_subject',$assign->class_id) }}">Delete</a>
                                    <a class="btn btn-success" href="{{ route('details.assign_subject',$assign->class_id) }}">Details</a>
                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Class Name</th>
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
