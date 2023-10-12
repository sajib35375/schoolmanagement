@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="my-5" style="margin: 25px;">
    <div class="row">
        <div class="col-md-12" style="display: block; margin: auto;">
            <div class="box box-solid bg-secondary">
                <div class="box-header">
                    <h4 class="box-title"><strong>Multiple Search</strong></h4>
                </div>

                <div class="box-body" >

                    <form action="{{ route('stu.reg.search') }}" method="GET">
                            @csrf
                        <div class="row" >
                            <div class="col-md-4">
                                <label for="">Year Name</label>
                                <select class="form-control" name="year_id" id="">
                                    <option value="">Select</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Class Name</label>
                                <select class="form-control" name="class_id" id="">
                                    <option value="">Select</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2" style="padding-top: 20px;">
                                <input value="Search" class="btn btn-info" type="submit" name="search">
                            </div>
                            <div class="col-md-2" style="padding-top: 20px;">
                                <a class="btn btn-success" href="{{ route('student.reg') }}">Refresh</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






<div class="my-5" style="margin: 25px;">
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Student Registration Table</h3>
                    <a style="float: right;" class="btn btn-primary" href="{{ route('student.add') }}">Student Add</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">



                        <table id="example5" class="table table-bordered table-striped" >
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Id No</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Class Name</th>
                                <th>Roll</th>
                                <th>Year</th>
                                <th>Photo</th>
                                <th width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($assign_stu as $assign)

                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $assign->student->name }}</td>
                                <td>{{ $assign->student->id_no }}</td>
                                <td>{{ $assign->student->phone }}</td>
                                <td>{{ $assign->student->gender }}</td>
                                <td>{{ $assign->class->name }}</td>
                                <td>{{ $assign->role_id }}</td>
                                <td>{{ $assign->year->year_name }}</td>
                                <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/upload/user/{{ $assign->student->image }}" alt=""></td>
                                <td width="20%">
                                    <a class="btn btn-info btn-sm" href="{{ route('stu.reg.edit',$assign->student_id) }}"><i class="fa fa-pencil"></i></a>
                                    <a id="delete" class="btn btn-danger btn-sm" href="{{ route('stu.reg.delete',$assign->id) }}"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-success btn-sm" href="{{ route('stu.promo',$assign->student_id) }}"><i class="fa fa-arrow-up"></i></a>
                                    <a target="_blank" class="btn btn-warning btn-sm" href="{{ route('stu.details.pdf',$assign->student_id) }}"><i class="fa fa-file-pdf-o"></i></a>
                                </td>

                            </tr>

                            @endforeach


                            </tbody>
                            <tfoot>
                            <tr>
                                <th >SL</th>
                                <th>Name</th>
                                <th>Id No</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Class Name</th>
                                <th>Roll</th>
                                <th>Year</th>
                                <th>Photo</th>
                                <th width="20%">Action</th>
                            </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>

@endsection
