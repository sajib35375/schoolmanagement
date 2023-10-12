@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Subject List</h2>

                    </div>
                    <div class="card-body">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subject as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>
                                                <a id="sub_modal_btn" sub_edit_id="{{ $item->id }}" class="btn btn-primary" href="">Edit</a>
                                                <a id="delete" class="btn btn-danger" href="{{ route('subject.delete',$item->id) }}">Delete</a>
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
                        <h2>Add Student Subject</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('subject.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="">Subject</label>
                                <input name="subject" class="form-control" type="text">
                                @error('subject')
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


    <div id="sub_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Fee Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subject.update') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="">Name</label>
                                <input name="sub_update_id" type="hidden">
                                <input name="subject" class="form-control" type="text">
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
            jQuery(document).on('click','#sub_modal_btn',function (e){
                e.preventDefault();
                let id = $(this).attr('sub_edit_id');

                jQuery.ajax({
                    url :'/subject/edit/'+id,
                    success : function (data){

                        jQuery('#sub_modal').modal('show');
                        jQuery('input[name="subject"]').val(data.subject);
                        jQuery('input[name="sub_update_id"]').val(data.id);
                    }
                })




            })
        })
    </script>


@endsection
