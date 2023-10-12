@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Shift List</h2>
                    </div>
                    <div class="card-body">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shift as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $item->shift }}</td>
                                            <td>
                                                <a id="shift_modal_btn" shift_edit_id="{{ $item->id }}" class="btn btn-primary" href="">Edit</a>
                                                <a id="delete" class="btn btn-danger" href="{{ route('student.shift.delete',$item->id) }}">Delete</a>
                                            </td>
                                        </tr>


                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Add Student Shift</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('student.shift.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="">Name</label>
                                <input name="shift" class="form-control" type="text">
                                @error('shift')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_shift" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Student Shift</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.shift.update') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="">Name</label>
                                <input name="shift_update_id" type="hidden">
                                <input name="shift" class="form-control" type="text">
                            </div>
                            <div class="form-group mb-4">
                                <input class="btn btn-success" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function (){
            jQuery(document).on('click','#shift_modal_btn',function (e){
                e.preventDefault();
                let id = $(this).attr('shift_edit_id');

                jQuery.ajax({
                    url :'/student/shift/edit/'+id,
                    success : function (data){

                        jQuery('#modal_shift').modal('show');
                        jQuery('input[name="shift"]').val(data.shift)
                        jQuery('input[name="shift_update_id"]').val(data.id)
                    }
                })




            })
        })
    </script>


@endsection
