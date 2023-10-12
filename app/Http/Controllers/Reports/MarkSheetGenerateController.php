<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\ExamType;
use App\Models\Grade;
use App\Models\StudentClass;
use App\Models\StudentMark;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarkSheetGenerateController extends Controller
{
    public function MarkSheetView(){
        $marks = StudentMark::all();
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $types = ExamType::all();
        return view('admin.reports.markshit.marksheet',compact('marks','years','classes','types'));
    }

    public function MarkSheetViewPDF(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $student = AssignStudent::with('student')->where('year_id',$year_id)->where('class_id',$class_id)->first();
        // dd($student);
        $fail_count = StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
        // dd($fail_count);
        $single_student = StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();

        if ($single_student==true) {

            $all_student = StudentMark::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();

            $allGrade = Grade::all();

            return view('admin.reports.markshit.marksheet_pdf',compact('allGrade','all_student','fail_count'));

        }else{
            $notification = array(
                'message' => 'Reports are not Found',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }


}
