@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Fee Amount</h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">

                        <form id="amount_form" action="{{ route('fee.amount.update',$edit_category->fee_id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="add_items">

                                        <div class="form-group">
                                            <h5>Select Fee Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="fee_id" id="fee_id" required class="form-control">
                                                    <option value="">Select Fee Category</option>
                                                    @foreach($fee_cat as $cat)
                                                        <option {{ $edit_category->fee_id == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                            @foreach($edit_data as $data)
                                            <div class="delete_add_extra_item" id="delete_add_extra_item">

                                        <div class="row">
                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <h5>Select Student Class <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="class_id[]" id="class_id" required class="form-control">
                                                            <option value="">Select Student Class </option>
                                                            @foreach($classes as $class)
                                                                <option {{ $data->class_id == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <h5>Select Student Class <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year_id[]" id="year_id" required class="form-control">
                                                            <option value="">Select Student Class </option>
                                                            @foreach($years as $year)
                                                                <option {{ $data->year_id == $year->id ? 'selected' : '' }} value="{{ $year->id }}">{{ $year->year_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Amount <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $data->amount }}" name="amount[]" class="form-control" required data-validation-required-message="This field is required"> </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3" style="padding-top: 25px;">
                                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                            </div>
                                        </div>

                                        </div>
                                            @endforeach


                                    </div>
                                </div>

                            </div>
                            <div class="text-xs-right">
                                <input id="submit_btn" type="submit" class="btn btn-rounded btn-info">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>


    <div style="visibility: hidden;">
        <div class="add_extra_item" id="add_extra_item">
            <div class="delete_add_extra_item" id="delete_add_extra_item">
                <div class="form-row">

                    <div class="col-12">


                        <div class="row">
                            <div class="col-md-3">

                                <div class="form-group">
                                    <h5>Select Student Class <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="class_id[]" id="class_id" required class="form-control">
                                            <option value="">Select Student Class </option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Select Student Class <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year_id[]" id="year_id" required class="form-control">
                                            <option value="">Select Student Class </option>
                                            @foreach($years as $year)
                                                <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Amount <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="amount[]" class="form-control" required data-validation-required-message="This field is required"> </div>

                                </div>
                            </div>

                            <div class="col-md-3" style="padding-top: 25px;">
                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            jQuery(document).ready(function (){
                var counter = 0;
                jQuery(document).on('click','.addeventmore',function (){
                    var add_extra_item = jQuery('#add_extra_item').html();
                    jQuery(this).closest('.add_items').append(add_extra_item);
                    counter++;
                });
                jQuery(document).on('click','.removeeventmore',function (){
                    jQuery(this).closest('#delete_add_extra_item').remove();
                    counter -= 1;
                });

                // jQuery(document).on('click','#submit_btn',function (){
                //     jQuery('form#amount_form').submit();
                // });
            })
        </script>




@endsection
