@extends('admin.admin_master')
@section('admin')


<div class="wrap" style="margin: 25px;">
    <div class="row">
        <div class="col-md-12 my-5">
            <div class="card">
                <div class="card-header">
                    <h2>Change Password</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.change') }}" method="POST">
                        @csrf
                        <div class="form-group mb-5">
                            <label for="">Current Password<span class="text-danger">*</span></label>
                            <input name="current_password" id="current_password" class="form-control" type="password">
                            @error('current_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">New Password<span class="text-danger">*</span></label>
                            <input name="password" id="password" class="form-control" type="password">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Confirm Password<span class="text-danger">*</span></label>
                            <input name="password_confirmation" id="current_password" class="form-control" type="password">
                            @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input class="btn btn-info" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
