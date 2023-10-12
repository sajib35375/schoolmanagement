@extends('admin.admin_master')
@section('admin')


    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12" style="padding: 30px;">
                <div class="card">
                    <div class="card-header">
                        <h2>Add New Grade</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.new.grade') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Grade Name <span class="text-danger">*</span></label>
                                    <input name="grade_name" class="form-control" type="text">
                                    @error('grade_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Grade Point<span class="text-danger">*</span></label>
                                    <input name="grade_point" class="form-control" type="text">
                                    @error('grade_point')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Start Marks<span class="text-danger">*</span></label>
                                    <input name="start_marks" class="form-control" type="text">
                                    @error('start_marks')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>



                                <div class="col-md-6">
                                    <label for="">End Marks<span class="text-danger">*</span></label>
                                    <input name="end_marks" class="form-control" type="text">
                                    @error('end_marks')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="">Start Point<span class="text-danger">*</span></label>
                                    <input name="start_point" class="form-control" type="text">
                                    @error('start_point')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>



                                <div class="col-md-6">
                                    <label for="">End Point<span class="text-danger">*</span></label>
                                    <input name="end_point" class="form-control" type="text">
                                    @error('end_point')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="">Remarks<span class="text-danger">*</span></label>
                                    <input name="remarks" class="form-control" type="text">
                                    @error('remarks')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
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

@endsection
