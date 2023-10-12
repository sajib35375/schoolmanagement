@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="my-5" style="margin: 25px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Fee Amount Details</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Class Name</th>
                                <th>Year Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $data)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $data->studentClass->name }}</td>
                                <td>{{ $data->studentYear->year_name }}</td>
                                <td>{{ $data->amount }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection
