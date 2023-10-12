@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="wrap" style="margin: 10px;">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Student Class List</h2>
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
                                @foreach($class as $item)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a id="modal_btn" edit_id="{{ $item->id }}" class="btn btn-primary" href="">Edit</a>
                                            <a id="delete" class="btn btn-danger" href="{{ route('student.class.delete',$item->id) }}">Delete</a>
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
                    <h2>Add Student Class</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.class.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="">Class Name</label>
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


<div id="modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Class</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.class.update') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="">Name</label>
                            <input name="update_id" type="hidden">
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
        jQuery(document).on('click','#modal_btn',function (e){
            e.preventDefault();
            let id = $(this).attr('edit_id');

            jQuery.ajax({
                url : '/student/class/edit/'+id,
                success : function (data){
                    jQuery('#modal').modal('show');
                    jQuery('input[name="name"]').val(data.name)
                    jQuery('input[name="update_id"]').val(data.id)
                }
            })
        })
    })
</script>


@endsection
