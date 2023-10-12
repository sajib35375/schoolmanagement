@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Salary Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">



                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>Id No</th>
                                    <th>Salary</th>
                                    <th>Join Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($all_data as $data)

                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->name ?? '' }}</td>
                                        <td>{{ $data->id_no ?? '' }}</td>
                                        <td>{{ $data->salary ?? '' }}</td>
                                        <td>{{ $data->join_date ?? '' }}</td>
                                        <td>
                                            <a id="increment" class="btn btn-info" increment_id="{{ $data->id }}" href=""><i class="fa fa-plus-circle"></i></a>
                                            <a class="btn btn-warning" href="{{ route('salary.increment.details',$data->id) }}"><i class="fa fa-eye"></i></a>
                                        </td>

                                    </tr>

                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>Id No</th>
                                    <th>Salary</th>
                                    <th>Join Date</th>
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


{{--    employee salary modal--}}

    <div id="salary_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Salary Increment</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('salary.increment.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="update_id" type="hidden">
                            <label for="">Increment Amount</label>
                            <input name="amount" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Effected Date</label>
                            <input name="effected" class="form-control" type="date">
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
        $(document).ready(function (){
            $(document).on('click','a#increment',function (e){
                e.preventDefault();
                let id = $(this).attr('increment_id');
                $.ajax({
                    url:"/salary/increment/"+id,
                    success:function (data){
                        $('#salary_modal input[name="update_id"]').val(data.id);
                        $('#salary_modal').modal('show');
                    }
                })

            })
        })
    </script>






@endsection
