@extends('admin.admin_master')
@section('admin')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <div class="wrap" style="margin: 15px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Add Other Fee</h2>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('other.fee.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="">Class Name</label>
                                            <select required class="form-control" name="class_id" id="">
                                                <option value="">Select</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="">Year Name</label>
                                            <select required class="form-control" name="year_id" id="">
                                                <option value="">Select</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="add_item">
                                    <div class="row mt-10">

                                        <div class="col-md-4">
                                            <label for="">Fee Name</label>
                                            <input required name="fee_name[]" class="form-control" type="text">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Amount</label>
                                            <input required name="fee_amount[]" class="form-control" type="text">
                                        </div>

                                        <div class="col-md-4" style="padding-top: 20px;">
                                            <span class="btn btn-success addrowitem"><i class="fa fa-plus-circle"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input class="btn btn-success" type="submit">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="visibility: hidden;">
            <div class="add_assign_subject" id="add_assign_subject">
                <div class="delete_add_assign_subject" id="delete_add_assign_subject">
                    <div class="view-form">


                        <div class="row">

                            <div class="col-md-4">
                                <label for="">Fee Name</label>
                                <input required name="fee_name[]" class="form-control" type="text">
                            </div>
                            <div class="col-md-4">
                                <label for="">Amount</label>
                                <input required name="fee_amount[]" class="form-control" type="text">
                            </div>
                            <div class="col-md-4" style="padding-top: 20px;">
                                <span class="btn btn-success addrowitem"><i class="fa fa-plus-circle"></i></span>
                                <span class="btn btn-danger deleterowitem"><i class="fa fa-minus-circle"></i></span>
                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
        </div>

        <script>
            jQuery(document).ready(function (){
                var counter = 0;
                jQuery(document).on('click','.addrowitem',function (){
                    var add_assign_subject = jQuery('#add_assign_subject').html();
                    jQuery(this).closest('.add_item').append(add_assign_subject);
                    counter++;
                });

                jQuery(document).on('click','.deleterowitem',function (){
                    jQuery(this).closest('#delete_add_assign_subject').remove();
                    counter -= 1;
                })

            });
        </script>


    @endsection







