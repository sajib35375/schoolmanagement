@extends('admin.admin_master')
@section('admin')

<div class="wrap" style="margin: 25px;">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="box box-solid box-inverse box-info">
              <div class="box-header with-border">
                <h4 class="box-title">All Student Marks</h4>
                <ul class="box-controls pull-right">

                </ul>
              </div>

              <div class="box-body">
                <div class="col-12">


                             <table id="example5" class="table table-bordered table-striped" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Student Session</th>
                                            <th>Student Class</th>
                                            <th>Student ID</th>
                                            <th>Subjects</th>
                                            <th>Marks</th>
                                             <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student_mark as $data)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $data->student->name }}</td>
                                            <td>{{ $data->year->year_name }}</td>
                                            <td>{{ $data->class->name }}</td>
                                            <td>{{ $data->student->id_no }}</td>
                                            <td>{{ $data->assign_subject->subject->subject }}</td>
                                            <td>{{ $data->marks }}</td>
                                             <td>
                                                <a id="delete" class="btn btn-danger" href="{{ route('all.marks.delete',$data->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                               <tfoot>
                                   <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Student Session</th>
                                    <th>Student Class</th>
                                    <th>Student ID</th>
                                    <th>Subjects</th>
                                    <th>Marks</th>
                                     <th>Action</th>
                                   </tr>
                               </tfoot>
                           </table>

                     <!-- /.box -->
                   </div>

              </div>
            </div>
          </div>
    </div>
</div>
<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
	<script src="js/pages/data-table.js"></script>
@endsection
