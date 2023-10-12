@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


   <div class="wrap" style="margin: 30px;">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h2>Other Fee Edit</h2>
                   </div>
                   <div class="card-body">

                       <form action="{{ route('other.fee.update',$edit_data->id) }}" method="POST">
                           @csrf
                           <div class="my-3">
                               <label for="">Class Name</label>
                               <select class="form-control" name="class_id" id="">
                                   <option value="">-Select-</option>
                                   @foreach($classes as $data)
                                   <option {{ $data->id == $edit_data->class_id ? 'selected' : '' }} value="{{ $data->id }}">{{ $data->name }}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="my-3">
                               <label for="">Year Name</label>
                               <select class="form-control" name="year_id" id="">
                                   <option value="">-Select-</option>
                                   @foreach($years as $data)
                                       <option {{ $data->id == $edit_data->year_id ? 'selected' : '' }} value="{{ $data->id }}">{{ $data->year_name }}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="my-3">
                               <label for="">Fee Name</label>
                               <input name="fee_name" value="{{ $edit_data->fee_name }}" class="form-control" type="text">
                           </div>
                           <div class="my-3">
                               <label for="">Fee Amount</label>
                               <input name="fee_amount" value="{{ $edit_data->fee_amount }}" class="form-control" type="text">
                           </div>
                           <div class="my-3">
                               <input class="btn btn-success" type="submit">
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>


@endsection







