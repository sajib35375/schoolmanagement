@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="my-5" style="margin: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Student</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('stu.reg.update',$edit_data->student_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Student Name <span class="text-danger">*</span></label>
                                    <input name="name" value="{{ $edit_data->student->name }}" class="form-control" type="text">
                                </div>
                                <input name="id" value="{{ $edit_data->id }}" type="hidden">
                                <div class="col-md-4">
                                    <label for="">Father's Name <span class="text-danger">*</span></label>
                                    <input name="fname" value="{{ $edit_data->student->fname }}" class="form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Mother's Name <span class="text-danger">*</span></label>
                                    <input name="mname" value="{{ $edit_data->student->mname }}" class="form-control" type="text">
                                </div>
                            </div>

                            <div class="row mt-10">
                                <div class="col-md-4">
                                    <label for="">Phone <span class="text-danger">*</span></label>
                                    <input name="phone" value="{{ $edit_data->student->phone }}" class="form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Address<span class="text-danger">*</span></label>
                                    <input name="address" value="{{ $edit_data->student->address }}" class="form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Email<span class="text-danger">*</span></label>
                                    <input name="email" value="{{ $edit_data->student->email }}" class="form-control" type="text">
                                </div>
                            </div>



                            <div class="row mt-10">
                                <div class="col-md-4">
                                    <label for="">Date of Birth <span class="text-danger">*</span></label>
                                    <input name="dob" value="{{ $edit_data->student->dob }}" class="form-control" type="date">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Religion<span class="text-danger">*</span></label>
                                    <select class="form-control" name="religion" id="">
                                        <option value="">Select</option>
                                        <option {{ $edit_data->student->religion == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                                        <option {{ $edit_data->student->religion == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                                        <option {{ $edit_data->student->religion == 'Christan' ? 'selected' : '' }} value="Christan">Christan</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Discount <span class="text-danger">*</span></label>
                                    <input name="discount" value="{{ $edit_data->discount->discount }}" class="form-control" type="text">
                                </div>
                            </div>




                            <div class="row mt-10">
                                <div class="col-md-4">
                                    <label for="">Student Year<span class="text-danger">*</span></label>
                                    <select class="form-control" name="year_id" id="">
                                        <option value="">Select</option>
                                        @foreach($years as $year)
                                            <option {{ $edit_data->year_id == $year->id ? 'selected' : '' }} value="{{ $year->id }}">{{ $year->year_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Student Class<span class="text-danger">*</span></label>
                                    <select class="form-control" name="class_id" id="">
                                        <option value="">Select</option>
                                        @foreach($classes as $class)
                                            <option {{ $edit_data->class_id == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Student Group<span class="text-danger">*</span></label>
                                    <select class="form-control" name="group_id" id="">
                                        <option value="">Select</option>
                                        @foreach($groups as $group)
                                            <option {{ $edit_data->group_id == $group->id ? 'selected' : '' }} value="{{ $group->id }}">{{ $group->group_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="row mt-10" style="margin-top: 25px;">
                                <div class="col-md-4">
                                    <label for="">Student Shift<span class="text-danger">*</span></label>
                                    <select class="form-control" name="shift_id" id="">
                                        <option value="">Select</option>
                                        @foreach($shifts as $shift)
                                            <option {{ $edit_data->shift_id == $shift->id ? 'selected' : '' }} value="{{ $shift->id }}">{{ $shift->shift }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Gender<span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender" id="">
                                        <option value="">Select</option>
                                        <option {{ $edit_data->student->gender == 'Male' ? 'selected' : '' }} value="Male">Male</option>
                                        <option {{ $edit_data->student->gender == 'Female' ? 'selected' : '' }} value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4" >
                                    <img style="width: 80px; height: 80px;" id="img" src="{{ URL::to('') }}/upload/user/{{ $edit_data->student->image }}" alt="">

                                    <input name="old_photo" value="{{ $edit_data->student->image }}" type="hidden">
                                    <input name="photo" class="form-control-file" type="file">
                                </div>


                            </div>



                            <div class="row" style="margin-top: 50px;">
                                <div class="col-md-12">
                                    <input class="btn btn-success btn-block" type="submit">
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
