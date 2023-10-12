@extends('admin.admin_master')
@section('admin')


    <div class="my-5" style="margin: 25px;">
        <div class="box my-5">
        <div class="box-header with-border">
            <h3 class="box-title">User List</h3>
            <a style="float: right;" class="btn btn-success" href="{{ route('user.add') }}">Add User</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Code</th>
                        <th width="25%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $all_user as $user )
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->code }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
                            <a id="delete" class="btn btn-danger" href="{{ route('user.delete',$user->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
        <!-- /.box-body -->
    </div>






@endsection
