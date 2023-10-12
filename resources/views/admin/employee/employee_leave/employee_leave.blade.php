@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <div class="wrap" style="margin: 10px;">
      <div class="row">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                      <h2>Employee Leave History</h2>
                  </div>
                  <div class="card-body">
                      <table class="table">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>ID No.</th>
                                <th>Purpose</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($leaves as $leave)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $leave->user->name }}</td>
                                <td>{{ $leave->user->id_no }}</td>
                                <td>{{ $leave->leave->name }}</td>
                                <td>{{ $leave->start_date }}</td>
                                <td>{{ $leave->end_date }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('employee.leave.edit',$leave->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a id="delete" class="btn btn-danger" href="{{ route('employee.leave.delete',$leave->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header">
                      <h2>Add Employee Leave</h2>
                  </div>
                  <div class="card-body">

                      <form action="{{ route('employee.leave.store') }}" method="POST">
                          @csrf

                          <div class="form-group">
                              <label for="">Employee Name</label>
                              <select class="form-control" required name="employee_id" id="">
                                  @foreach($all_employee as $all)
                                  <option value="{{ $all->id }}">{{ $all->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="">Leave Purpose</label>
                              <select class="form-control" required id="purpose" name="purpose_id">
                                  @foreach($purposes as $purpose)
                                  <option value="{{ $purpose->id }}">{{ $purpose->name }}</option>
                                  @endforeach
                                  <option value="0">New Problem</option>
                              </select>
                              <input style="display: none;" name="new_purpose" class="form-control" placeholder="Write Your Problem" type="text">
                          </div>
                          <div class="form-group">
                              <label for="">Start Date</label>
                              <input name="start_date" class="form-control" type="date">
                          </div>
                          <div class="form-group">
                              <label for="">End Date</label>
                              <input name="end_date" class="form-control" type="date">
                          </div>
                          <div class="form-group">
                              <input class="btn btn-success" type="submit">
                          </div>
                      </form>
                  </div>
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
