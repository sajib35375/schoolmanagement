@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Fee Category List</h2>
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
                                    @foreach($fee_cat as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <a id="fee_modal_btn" fee_edit_id="{{ $item->id }}" class="btn btn-primary" href="">Edit</a>
                                                <a id="delete" class="btn btn-danger" href="{{ route('fee.category.delete',$item->id) }}">Delete</a>
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
                        <h2>Add Student Fee Category</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('fee.category.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="">Name</label>
                                <input name="name" class="form-control" type="text">
                                @error('name')
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


    <div id="modal_fee_cat" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Fee Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('fee.category.update') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="">Name</label>
                                <input name="fee_update_id" type="hidden">
                                <input name="name" class="form-control" type="text">
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
            jQuery(document).on('click','#fee_modal_btn',function (e){
                e.preventDefault();
                let id = $(this).attr('fee_edit_id');

                jQuery.ajax({
                    url :'/fee/category/edit/'+id,
                    success : function (data){

                        jQuery('#modal_fee_cat').modal('show');
                        jQuery('input[name="name"]').val(data.name)
                        jQuery('input[name="fee_update_id"]').val(data.id)
                    }
                })




            })
        })
    </script>


@endsection
