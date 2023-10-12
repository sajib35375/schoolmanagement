<?php

namespace App\Http\Controllers\Reports;

use App\Models\Grade;
use App\Models\ExamType;
use App\Models\StudentMark;
use App\Models\StudentYear;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\User;

class StudentResultController extends Controller
{
    public function StudentResultView(){
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $exam_types = ExamType::all();

        return view('admin.reports.result.student_result',compact('years','classes','exam_types'));
    }

    public function StudentResultPDF(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;

        $single_student = StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();

        $fail_count = StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('marks','<','33')->get()->count();

        if ($single_student==true) {
            $all_student = StudentMark::select('year_id','class_id','exam_type_id','student_id','marks','assign_subject_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('assign_subject_id')->groupBy('student_id')->groupBy('marks')->get();

            $all_data = StudentMark::groupBy('student_id')->sum('marks');

            $allGrade = Grade::all();

           return view('admin.reports.result.student_result_pdf',compact('all_student','allGrade','fail_count','all_data'));

        }else{
            $notification = array(
                'message' => 'Sorry,We are not able to Generate PDF',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
