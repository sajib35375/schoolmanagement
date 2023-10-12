@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="my-5" style="margin: 25px;">
        <div class="card">
            <div class="card-header">
                <h2>Student Result View</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('student.result.pdf') }}" method="GET" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Years</label>
                           <select class="form-control" name="year_id" id="year_id">
                            <option value="">Select</option>
                            @foreach ($years as $year)
                            <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                            @endforeach

                           </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Classes</label>
                            <select class="form-control" name="class_id" id="class_id">
                                <option value="">Select</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach

                               </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Exam Type</label>
                            <select class="form-control" name="exam_type_id" id="exam_type_id">
                                <option value="">Select</option>
                                @foreach ($exam_types as $type)
                                <option value="{{ $type->id }}">{{ $type->exam_type }}</option>
                                @endforeach

                               </select>
                        </div>

                        <div class="col-md-3 my-5" style="padding-top: 20px;">
                            <input id="btn" value="Search"  class="btn btn-primary" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
