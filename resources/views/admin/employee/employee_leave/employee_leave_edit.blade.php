
@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="my-5" style="margin: 25px;">



    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Add Employee Leave</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('employee.leave.update',$edit_data->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Employee Name</label>
                        <select class="form-control" required name="employee_id" id="">
                            @foreach($all_employee as $all)
                                <option {{ $edit_data->employee_id == $all->id ? 'selected':'' }} value="{{ $all->id }}">{{ $all->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Leave Purpose</label>
                        <select class="form-control" required id="purpose" name="purpose_id">
                            @foreach($purposes as $purpose)
                                <option {{ $edit_data->purpose_id == $purpose->id ? 'selected':'' }} value="{{ $purpose->id }}">{{ $purpose->name }}</option>
                            @endforeach
                            <option value="0">New Problem</option>
                        </select>
                        <input style="display: none;" name="new_purpose" class="form-control" placeholder="Write Your Problem" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input name="start_date" value="{{ $edit_data->start_date }}" class="form-control" type="date">
                    </div>
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input name="end_date" value="{{ $edit_data->end_date }}" class="form-control" type="date">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>






    <script>
        jQuery(document).ready(function (){
            jQuery(document).on('change','#purpose',function (){
                let id = $(this).val();
                if( id == 0 ){
                    jQuery('input[name="new_purpose"]').show();
                }else{
                    jQuery('input[name="new_purpose"]').hide();
                }
            })
        })
    </script>


@endsection
