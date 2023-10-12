@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12" style="padding: 30px;">
                <div class="card">
                    <div class="card-header">
                        <h2>Add New Employee</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('add.employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Employee Name <span class="text-danger">*</span></label>
                                    <input name="name" class="form-control" type="text">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">Father's Name <span class="text-danger">*</span></label>
                                    <input name="fname" class="form-control" type="text">
                                    @error('fname')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">Mother's Name <span class="text-danger">*</span></label>
                                    <input name="mname" class="form-control" type="text">
                                    @error('mname')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-10">
                                <div class="col-md-4">
                                    <label for="">Phone <span class="text-danger">*</span></label>
                                    <input name="phone" class="form-control" type="text">
                                    @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">Address<span class="text-danger">*</span></label>
                                    <input name="address" class="form-control" type="text">
                                    @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">Gender<span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender" id="">
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    @error('gender')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mt-10">
                                <div class="col-md-4">
                                    <label for="">Date of Birth <span class="text-danger">*</span></label>
                                    <input name="dob" class="form-control" type="date">
                                    @error('dob')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">Religion<span class="text-danger">*</span></label>
                                    <select class="form-control" name="religion" id="">
                                        <option value="">Select</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Christan">Christan</option>
                                    </select>
                                    @error('religion')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="">Join Date<span class="text-danger">*</span></label>
                                    <input name="join_date" class="form-control" type="date">
                                    @error('join_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>








                            <div class="row mt-10">
                                <div class="col-md-3">
                                    <label for="">Salary<span class="text-danger">*</span></label>
                                    <input name="salary" class="form-control" type="text">
                                    @error('salary')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="">Designation<span class="text-danger">*</span></label>
                                    <select class="form-control" name="designation_id" id="">
                                        @foreach($designations as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('designation_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3" style="margin-top: 30px;">
                                    <input name="photo" class="form-control-file" type="file">
                                    @error('photo')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <img id="img" src="" alt="">
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
