@extends('admin.admin_master')
@section('admin')

    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Other Cost</h3>
                        <a style="float: right;" class="btn btn-primary" href="{{ route('other.cost.add') }}">Add Other Cost</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th width="25%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($allData as $data)

                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->amount }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td><img style="width: 60px;height: 60px;" src="{{ URL::to('') }}/images/other_cost/{{ $data->image }}" alt=""></td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('other.cost.edit',$data->id) }}">Edit</a>
                                            <a id="delete" class="btn btn-danger" href="{{ route('other.cost.delete',$data->id) }}">Delete</a>
                                        </td>

                                    </tr>

                                @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
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
