@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="my-5" style="margin: 25px;">
    <div class="card">
        <div class="card-header">
            <h2>Edit Profile</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-5">
                                <label for="">Name</label>
                                <input name="name" value="{{ $edit_data->name }}" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-5">
                                <label for="">Email</label>
                                <input name="email" value="{{ $edit_data->email }}" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="">Phone</label>
                            <input name="phone" value="{{ $edit_data->phone }}" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="">Address</label>
                            <input name="address" value="{{ $edit_data->address }}" class="form-control" type="text">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="">Gender</label>
                            <select class="form-control" name="gender" id="">
                                <option value="">-select-</option>
                                <option {{ $edit_data->gender == 'Male' ? 'selected' : '' }} value="Male">Male</option>
                                <option {{ $edit_data->gender == 'Female' ? 'selected' : '' }} value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="">Photo</label>
                            <input name="old_photo" value="{{ $edit_data->image }}" type="hidden">
                            <input name="photo" class="form-control-file" type="file">
                            <img id="img" style="width: 100px;height: 100px;" src="{{ (!empty($edit_data->image)) ? url('upload/profile/'.$edit_data->image) : url('upload/index.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input class="btn btn-success" type="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    jQuery(document).ready(function (){
        jQuery(document).on('change','input[name="photo"]',function (e){
            e.preventDefault();

            let url = URL.createObjectURL(e.target.files[0]);

            jQuery('img#img').attr('src',url).width('100px').height('100px');
        })
    })



</script>







@endsection
