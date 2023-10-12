@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="my-5" style="margin: 25px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Student</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('stu.reg.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Student Name <span class="text-danger">*</span></label>
                                <input name="name" required="" class="form-control" type="text">
                            </div>
                            <div class="col-md-4">
                                <label for="">Father's Name <span class="text-danger">*</span></label>
                                <input name="fname" required="" class="form-control" type="text">
                            </div>
                            <div class="col-md-4">
                                <label for="">Mother's Name <span class="text-danger">*</span></label>
                                <input name="mname" required="" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-md-4">
                                <label for="">Phone <span class="text-danger">*</span></label>
                                <input name="phone" required="" class="form-control" type="text">
                            </div>
                            <div class="col-md-4">
                                <label for="">Address<span class="text-danger">*</span></label>
                                <input name="address" required="" class="form-control" type="text">
                            </div>
                            <div class="col-md-4">
                                <label for="">Email<span class="text-danger">*</span></label>
                                <input name="email" required="" class="form-control" type="text">
                            </div>

                        </div>



                        <div class="row mt-10">
                            <div class="col-md-4">
                                <label for="">Date of Birth <span class="text-danger">*</span></label>
                                <input name="dob" required="" class="form-control" type="date">
                            </div>
                            <div class="col-md-4">
                                <label for="">Religion<span class="text-danger">*</span></label>
                                <select class="form-control" required="" name="religion" id="">
                                    <option value="">Select</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Christan">Christan</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Discount <span class="text-danger">*</span></label>
                                <input name="discount" class="form-control" type="text">
                            </div>
                        </div>




                        <div class="row mt-10">
                            <div class="col-md-4">
                                <label for="">Student Year<span class="text-danger">*</span></label>
                                <select class="form-control" required="" name="year_id" id="">
                                    <option value="">Select</option>
                                    @foreach($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Student Class<span class="text-danger">*</span></label>
                                <select class="form-control" required="" name="class_id" id="">
                                    <option value="">Select</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Student Group<span class="text-danger">*</span></label>
                                <select class="form-control" required="" name="group_id" id="">
                                    <option value="">Select</option>
                                    @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="row mt-10" style="margin-top: 25px;">
                            <div class="col-md-4">
                                <label for="">Student Shift<span class="text-danger">*</span></label>
                                <select class="form-control" required="" name="shift_id" id="">
                                    <option value="">Select</option>
                                    @foreach($shifts as $shift)
                                    <option value="{{ $shift->id }}">{{ $shift->shift }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="">Gender<span class="text-danger">*</span></label>
                                <select class="form-control" required="" name="gender" id="">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-4" style="margin-top: 30px;">
                                <input name="photo" required="" class="form-control-file" type="file">
                            </div>
                            <div class="col-md-4">
                                <img id="img" src="" alt="">
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
