@extends('admin.admin_master')
@section('admin')

<div class="my-5" style="margin:25px;">
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black" style="background: url({{ asset('admin/images/gallery/full/10.jpg') }}) center center;">
            <h3 style="color: dimgrey;" class="widget-user-username">{{ $data->name }}</h3>
            <h6 style="color: dimgrey;" class="widget-user-desc">Role : {{ $data->userType }}</h6>
            <a style="float: right;" class="btn btn-secondary" href="{{ route('profile.edit') }}">Edit Profile</a>
            <h6 style="color: dimgrey;" class="widget-user-desc">Email : {{ $data->email }}</h6>
        </div>
        <div class="widget-user-image">
            <img class="rounded-circle" src="{{ (!empty($data->image)) ? url('upload/profile/'.$data->image) : url('upload/index.jpg') }}" alt="User Avatar">
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5  class="description-header">{{ $data->phone }}</h5>
                        <span  class="description-text">PHONE</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 br-1 bl-1">
                    <div class="description-block">
                        <h5 class="description-header">{{ $data->address }}</h5>
                        <span class="description-text">ADDRESS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">{{ $data->gender }}</h5>
                        <span class="description-text">GENDER</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>

</div>






@endsection
