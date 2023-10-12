@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="container" >
        <div class="row">
            <div class="col-md-12" style="padding: 30px;">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Employee</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.employee',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Employee Name <span class="text-danger">*</span></label>
                                    <input name="name" value="{{ $edit_data->name }}" class="form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Father's Name <span class="text-danger">*</span></label>
                                    <input name="fname" value="{{ $edit_data->fname }}" class="form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Mother's Name <span class="text-danger">*</span></label>
                                    <input name="mname" value="{{ $edit_data->mname }}" class="form-control" type="text">
                                </div>
                            </div>

                            <div class="row mt-10">
                                <div class="col-md-4">
                                    <label for="">Phone <span class="text-danger">*</span></label>
                                    <input name="phone" value="{{ $edit_data->phone }}" class="form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Address<span class="text-danger">*</span></label>
                                    <input name="address" value="{{ $edit_data->address }}" class="form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Gender<span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender" id="">
                                        <option value="">Select</option>
                                        <option {{ $edit_data->gender == 'Male' ?'selected' : '' }} value="Male">Male</option>
                                        <option {{ $edit_data->gender == 'Female' ?'selected' : '' }} value="Female">Female</option>
                                    </select>
                                </div>
                            </div>



                            <div class="row mt-10">
                                <div class="col-md-4">
                                    <label for="">Date of Birth <span class="text-danger">*</span></label>
                                    <input name="dob" value="{{ $edit_data->dob }}" class="form-control" type="date">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Religion<span class="text-danger">*</span></label>
                                    <select class="form-control" name="religion" id="">
                                        <option value="">Select</option>
                                        <option {{ $edit_data->religion == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                                        <option {{ $edit_data->religion == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                                        <option {{ $edit_data->religion == 'Christan' ? 'selected' : '' }} value="Christan">Christan</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Join Date<span class="text-danger">*</span></label>
                                    <input name="join_date" value="{{ $edit_data->join_date }}" class="form-control" type="date">
                                </div>

                            </div>


                            <div class="row mt-10">
                                <div class="col-md-3">
                                    <label for="">Salary<span class="text-danger">*</span></label>
                                    <input name="salary" value="{{ $edit_data->salary }}" class="form-control" type="text">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Designation<span class="text-danger">*</span></label>
                                    <select class="form-control" name="designation_id" id="">
                                        @foreach($designations as $data)
                                            <option {{ $edit_data->designation_id == $data->id ?'selected':'' }} value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3" style="margin-top: 30px;">
                                    <input name="old_photo" value="{{ $edit_data->image }}" type="hidden">
                                    <input name="photo" class="form-control-file" type="file">
                                </div>

                                <div class="col-md-3">
                                    <img id="img" src="{{ URL::to('') }}/images/employee/{{ $edit_data->image }}" alt="">
                                </div>


                            </div>


                            <div class="row" style="margin-top: 50px;">
                                <div class="col-md-12">
                                    <input class="btn btn-success" type="submit">
                                </div>
                            </div>




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        jQuery(document).ready(function (){
            jQuery(document).on('change','input[name="photo"]',function (e){
                e.preventDefault();

                let url = URL.createObjectURL(e.target.files[0]);
                jQuery('img#img').attr('src',url).width('200px').height('200px');
            })
        })
    </script>





@endsection
