@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 25px;">
       <div class="card">
           <div class="card-header">
               <h2>Add New User</h2>
           </div>
           <div class="card-body">

               <form action="{{ route('user.store') }}" method="POST">
                   @csrf
               <div class="row">

                       <div class="col-md-6">
                           <label for="">Role</label>
                           <select class="form-control" name="role" id="">
                               <option value="">-Select-</option>

                               <option value="Admin">Admin</option>
                               <option value="Oparetor">Oparetor</option>

                           </select>
                           @error('role')
                            <p class="text-danger">{{ $message }}</p>
                           @enderror
                       </div>
                       <div class="col-md-6">
                           <label for="">Name</label>
                           <input name="name" class="form-control" type="text">
                           @error('name')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                       </div>

                   </div>

               <div class="row">

                       <div class="col-md-6">
                           <label for="">Email</label>
                           <input name="email" class="form-control" type="text">
                           @error('email')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                       </div>
                       <div class="col-md-6">
{{--                           <label for="">Password</label>--}}
{{--                           <input name="password" class="form-control" type="password">--}}
{{--                           @error('password')--}}
{{--                           <p class="text-danger">{{ $message }}</p>--}}
{{--                           @enderror--}}
                       </div>

               </div>


                       <div class="col-md-12 my-5">
                           <input class="btn btn-success" type="submit">
                       </div>

               </form>
           </div>
       </div>
    </div>








@endsection
