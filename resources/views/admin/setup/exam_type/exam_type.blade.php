@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Exam Type List</h2>
                    </div>
                    <div class="card-body">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Exam Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exam as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $item->exam_type }}</td>
                                            <td>
                                                <a id="exam_modal_btn" exam_edit_id="{{ $item->id }}" class="btn btn-primary" href="">Edit</a>
                                                <a id="delete" class="btn btn-danger" href="{{ route('exam.type.delete',$item->id) }}">Delete</a>
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
                        <h2>Add Student Exam Type</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('exam.type.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="">Exam Type</label>
                                <input name="exam_type" class="form-control" type="text">
                                @error('exam_type')
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


    <div id="modal_exam_type" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Fee Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('exam.type.update') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="">Name</label>
                                <input name="exam_update_id" type="hidden">
                                <input name="exam_type" class="form-control" type="text">
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
            jQuery(document).on('click','#exam_modal_btn',function (e){
                e.preventDefault();
                let id = $(this).attr('exam_edit_id');

                jQuery.ajax({
                    url :'/exam/type/edit/'+id,
                    success : function (data){

                        jQuery('#modal_exam_type').modal('show');
                        jQuery('input[name="exam_type"]').val(data.exam_type)
                        jQuery('input[name="exam_update_id"]').val(data.id)
                    }
                })




            })
        })
    </script>


@endsection
