@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="my-5" style="margin: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Promotion</h2>
                        <h4>Student Name : {{ $edit_data->student->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('stu.promo.update',$edit_data->student_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mt-10">
                                <input name="assign_id" value="{{ $edit_data->id }}" type="hidden">
                                <div class="col-md-6">
                                    <label for="">Discount <span class="text-danger">*</span></label>
                                    <input name="discount" value="{{ $edit_data->discount->discount }}" class="form-control" type="text">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Student Year<span class="text-danger">*</span></label>
                                    <select class="form-control" name="year_id" id="">
                                        <option value="">Select</option>
                                        @foreach($years as $year)
                                            <option {{ $edit_data->year_id == $year->id ? 'selected' : '' }} value="{{ $year->id }}">{{ $year->year_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="row mt-10">

                                <div class="col-md-6">
                                    <label for="">Student Class<span class="text-danger">*</span></label>
                                    <select class="form-control" name="class_id" id="">
                                        <option value="">Select</option>
                                        @foreach($classes as $class)
                                            <option {{ $edit_data->class_id == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <label for="">Student Shift<span class="text-danger">*</span></label>
                                    <select class="form-control" name="shift_id" id="">
                                        <option value="">Select</option>
                                        @foreach($shifts as $shift)
                                            <option {{ $edit_data->shift_id == $shift->id ? 'selected' : '' }} value="{{ $shift->id }}">{{ $shift->shift }}</option>
                                        @endforeach
                                    </select>
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







@endsection
