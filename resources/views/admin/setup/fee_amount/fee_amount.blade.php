@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="wrap my-5" style="margin: 25px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Student Fee Amount</h2>
                    <a style="float: right;" class="btn btn-primary" href="{{ route('add.fee.amount') }}">Add Fee</a>
                </div>
                <div class="card-body">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Fee Category Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($amount as $item)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $item->fee_category->name }}</td>
                                        <td>
                                            <a  class="btn btn-primary" href="{{ route('fee.amount.edit',$item->fee_id) }}">Edit</a>
                                            <a id="delete" class="btn btn-danger" href="{{ route('fee.amount.delete',$item->fee_id) }}">Delete</a>
                                            <a class="btn btn-success" href="{{ route('fee.amount.details',$item->fee_id) }}">Details</a>
                                        </td>
                                    </tr>


                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
