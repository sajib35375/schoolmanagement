@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12" style="display: block; margin: auto;">
                <div class="box box-solid bg-secondary">
                    <div class="box-header">
                        <h4 class="box-title"><strong>Marks Entry</strong></h4>
                    </div>

                    <div class="box-body" >

                        <form action="{{ route('subject.mark.store') }}" method="POST">
                            @csrf
                            <div class="row" >
                                <div class="col-md-3">
                                    <label for="">Year Name</label>
                                    <select id="year_id" class="form-control" name="year_id" id="">
                                        <option value="">Select</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('year_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="">Class Name</label>
                                    <select id="class_id" class="form-control" name="class_id" id="">
                                        <option value="">Select</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="">Subject Name</label>
                                    <select id="assign_subject_id" class="form-control" name="assign_subject_id">
                                        <option value="">Select</option>

                                    </select>
                                    @error('assign_subject_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="">Exam Type</label>
                                    <select id="exam_type_id" class="form-control" name="exam_type_id">
                                        <option value="">Select</option>
                                        @foreach($exams as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->exam_type }}</option>
                                    @endforeach
                                    </select>
                                    @error('exam_type_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3" style="padding-top: 20px;">
                                    <a id="search" class="btn btn-primary" href="#">Search</a>
                                </div>
                            </div>


                            <div class="row d-none" id="remove">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Father Name</th>
                                            <th>ID No</th>
                                            <th>Roll No.</th>
                                            <th>Gender</th>
                                            <th>Marks</th>

                                        </tr>
                                    </thead>
                                    <tbody id="Student_Marks">




                                    </tbody>
                                </table>
                                <input class="btn btn-primary" type="submit">
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
               var assign_subject_id = jQuery('#assign_subject_id').val();
               var exam_type_id = jQuery('#exam_type_id').val();

               jQuery.ajax({
                   url: "/roll/search/",
                   type: "GET",
                   data: {
                       year_id:year_id,
                       class_id:class_id,
                       assign_subject_id:assign_subject_id,
                       exam_type_id:exam_type_id
                   },
                   success:function (data){
                     jQuery('#remove').removeClass('d-none');
                     var html = '';
                     jQuery.each(data,function (key,val){
                         html += `
                            <tr>
                            <td>${key+1}<input name="student_id[]" value="${val.student_id}" type="hidden"><input value="${val.student.id_no}" name="id_no[]" type="hidden"></td>
                            <td>${val.student.name}</td>
                            <td>${val.student.fname}</td>
                            <td>${val.student.id_no}</td>
                            <td>${val.role_id}</td>
                            <td>${val.student.gender}</td>
                            <td><input name="marks[]"></td>

                        </tr>

                         `;
                     })
                       jQuery('#Student_Marks').html(html);
                   }
               })

            })
        })


    </script>

    <script>

        $(document).ready(function(){

           $(function(){
            $(document).on('change','#class_id',function(e){
                e.preventDefault();
                let class_id = $(this).val();

                $.ajax({
                    url:"{{ url('student/subject/get') }}",
                    data:{class_id:class_id},
                    type:"GET",
                    success:function(data){
                        $('#assign_subject_id').empty();
                        $('#assign_subject_id').append('<option value="">Select</option>');
                        $.each(data,function(key,value){
                            $('#assign_subject_id').append('<option value="'+value.id+'">'+value.subject.subject+'</option>');
                        })
                    }
                })
            })
           })
        })



    </script>





@endsection
