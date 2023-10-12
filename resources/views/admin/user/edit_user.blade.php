@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 25px;">
        <div class="card">
            <div class="card-header">
                <h2>Edit User</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('user.update',$edit_user->id) }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <label for="">Role</label>
                            <select class="form-control" name="role" id="">
                                <option value="">-Select-</option>

                                <option {{ $edit_user->role == 'Admin' ? 'selected' : '' }} value="Admin">Admin</option>
                                <option {{ $edit_user->role == 'Oparetor' ? 'selected' : '' }} value="Oparetor">Oparetor</option>

                            </select>
                            @error('role')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input name="name" value="{{ $edit_user->name }}" class="form-control" type="text">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="">Email</label>
                            <input name="email" value="{{ $edit_user->email }}" class="form-control" type="text">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>


                    <div class="col-md-12 my-5">
                        <input value="Update" class="btn btn-success" type="submit">
                    </div>

                </form>
            </div>
        </div>
    </div>








@endsection
