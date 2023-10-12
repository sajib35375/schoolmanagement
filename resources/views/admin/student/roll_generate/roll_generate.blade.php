@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12" style="display: block; margin: auto;">
                <div class="box box-solid bg-secondary">
                    <div class="box-header">
                        <h4 class="box-title"><strong>Roll Generate</strong></h4>
                    </div>

                    <div class="box-body" >

                        <form action="{{ route('roll.generate.store') }}" method="POST">
                            @csrf
                            <div class="row" >
                                <div class="col-md-4">
                                    <label for="">Year Name</label>
                                    <select id="year_id" class="form-control" name="year_id" id="">
                                        <option value="">Select</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Class Name</label>
                                    <select id="class_id" class="form-control" name="class_id" id="">
                                        <option value="">Select</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2" style="padding-top: 20px;">
                                    <a id="search" class="btn btn-primary" href="#">Search</a>
                                </div>

                            </div>


                            <div class="row d-none" id="remove">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Father Name</th>
                                            <th>ID No</th>
                                            <th>Gender</th>
                                            <th>Roll</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-data">




                                    </tbody>
                                </table>
                            </div>




                            <div class="col-md-2" style="padding-top: 20px;">
                                <input id="generate" value="Generate" class="btn btn-info" type="submit">
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>

        jQuery(document).ready(function (){
            jQuery(document).on('click','#search',function (){
               var year_id = jQuery('#year_id').val();
               var class_id = jQuery('#class_id').val();

               jQuery.ajax({
                   url: "/roll/search/",
                   type: "GET",
                   data: {
                       'year_id':year_id,
                       'class_id':class_id
                   },
                   success:function (data){
                     jQuery('#remove').removeClass('d-none');
                     var html = '';
                     jQuery.each(data,function (key,val){
                         html += `


                                           <tr>
                                            <td>${key+1}<input name="student_id[]" value="${val.student_id}" type="hidden"></td>
                                            <td>${val.student.name}</td>
                                            <td>${val.student.email}</td>
                                            <td>${val.student.fname}</td>
                                            <td>${val.student.id_no}</td>
                                            <td>${val.student.gender}</td>
                                            <td><input class="form-control" name="roll[]" value="${val.role_id}" type="text"></td>
                                        </tr>





                         `;
                     })
                       jQuery('#table-data').html(html);
                   }
               })

            })
        })


    </script>




@endsection
