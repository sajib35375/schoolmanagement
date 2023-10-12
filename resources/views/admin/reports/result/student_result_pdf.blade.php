@extends('admin.admin_master')
@section('admin')


<div class="wrap" style="margin: 25px;">
    <div class="row">


        <div class="col-md-12 col-12">
            <div class="box box-solid box-inverse box-info">
              <div class="box-header with-border">
                <h4 class="box-title">All Mark Sheet <strong>View</strong></h4>

              </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/images/markSheet/easyschool.png" alt="">
                        </div>

                        <div class="col-md-2 text-center">

                        </div>
                        <div class="col-md-2 text-center">
                            <h3>Khilgaon Government High School</h3>
                            <p><strong>Address: </strong> Khilgaon,Dhaka-1219</p>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <hr style="border:solid 1px;">
                        <p style="float: right;"><strong>Print Date: </strong> {{ date('Y M D') }}</p>
                    </div>


                </div>
            </div>

          </div>


          <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-6">
                            <table border="1" style="border-collapse: #ffffff; width: 100%;" cellpadding="1" cellsacing="2">
                                <tr>
                                    <td>Exam_Type</td>
                                    <td>{{ $all_student['0']['exam_type']['exam_type'] }}</td>
                                </tr>
                                <tr>
                                    <td>Student Class</td>
                                    <td>{{ $all_student['0']['class']['name'] }}</td>
                                </tr>
                                <tr>
                                    <td>Student Session</td>
                                    <td>{{ $all_student['0']['year']['year_name'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table border="1" style="border-collapse: #ffffff; width: 100%;" cellpadding="1" cellsacing="2">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>#</th>
                                        <th>Grade Name</th>
                                        <th>Grade Point</th>
                                        <th>Marks Interval</th>
                                        <th>Grade Interval</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allGrade as $grade)
                                    <tr style="text-align:center;">
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $grade->grade_name }}</td>
                                        <td>{{ number_format((float)$grade->grade_point,2) }}</td>
                                        <td>{{ $grade->start_marks }} - {{ $grade->end_marks }}</td>
                                        <td>{{ $grade->start_point }} - {{ $grade->end_point }}</td>
                                        <td>{{ $grade->remarks }}</td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                   </div>
                </div>
            </div>
          </div>




    </div>



    <br><br>
      <div class="row"> <!-- 3td row start -->
        <div class="col-md-12">

<table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1" cellspacing="1">
<thead>
  <tr>
    <th class="text-center">SL</th>
    <th class="text-center">Student Name</th>
    <th class="text-center">Subject</th>


    <th class="text-center">Get Marks</th>
    <th class="text-center">Letter Grade</th>
    <th class="text-center">Grade Point</th>
  </tr>
</thead>

<tbody>
  @php
      $total_marks = 0;
      $total_point = 0;
  @endphp

@foreach($all_student as $key => $mark)
@php
  $get_mark = $mark->marks;
  $total_marks = (float)$total_marks+(float)$get_mark;

  $total_subject = App\Models\StudentMark::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();

@endphp

<tr>
  <td class="text-center">{{ $key+1 }}</td>
  <td class="text-center">{{ $mark->student->name }}</td>
  {{-- @if ($mark->subject) --}}
  <td class="text-center">{{ $mark->assign_subject->subject->subject }}</td>
  {{-- @else --}}
  {{-- <td></td> --}}
  {{-- @endif --}}




  <td class="text-center">{{ $get_mark }}</td>

@php
  $grade_marks = App\Models\Grade::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=',(int)$get_mark ]])->first();
  $grade_name = $grade_marks->grade_name;
  $grade_point = number_format((float)$grade_marks->grade_point,2);
  $total_point = (float)$total_point+(float)$grade_point;
@endphp
<td class="text-center">{{ $grade_name }}</td>
<td class="text-center">{{ $grade_point }}</td>

</tr>
@endforeach

{{-- <tr>
  <td colspan="3"><strong style="padding-left: 30px;">Total Maks</strong></td>
  <td colspan="3"><strong style="padding-left: 38px;">{{ $total_marks }}</strong></td>
</tr> --}}

</tbody>
          </table>

        </div> <!-- // end Col md -12    -->
      </div> <!-- end 3td row start -->



      <br><br>






 <br><br><br><br>

<div class="row"> <!--  6th row start -->
  <div class="col-md-4">
    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
    <div class="text-center">Teacher</div>
  </div>

    <div class="col-md-4">
  <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
    <div class="text-center">Parents / Guardian </div>
  </div>

    <div class="col-md-4">
 <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
    <div class="text-center">Principal / Headmaster</div>
  </div>

</div>  <!--  End 6th row start -->


<br><br>




</div>

@endsection
