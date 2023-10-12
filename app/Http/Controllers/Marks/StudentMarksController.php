<?php

namespace App\Http\Controllers\Marks;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMark;
use App\Models\StudentYear;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentMarksController extends Controller
{

    public function StudentMarksAdd(){
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $exams = ExamType::all();
        return view('admin.student.marks.student_marks',compact('years','exams','classes'));
    }


    public function StudentSubjectGet(Request $request){
        $class_id = $request->class_id;
        $all_data = AssignSubject::with('subject')->where('class_id',$class_id)->get();

        return response()->json($all_data);

    }

    public function StudentSubjectMarks(Request $request){
        $class_id = $request->class_id;
        $year_id = $request->year_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;

        $all_marks = StudentMark::with('subject')->where('class_id',$class_id)->where('year_id',$year_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();

        return response()->json($all_marks);

    }

    public function StoreSubjectMarks(Request $request){
        $this->validate($request,[
            'year_id' => 'required',
            'class_id' => 'required',
            'assign_subject_id' => 'required',
            'exam_type_id' => 'required'
        ]);

        $studentCount = count($request->student_id);

        if ($studentCount) {
            for($i=0;$i<$studentCount;$i++){
                StudentMark::insert([
                    'year_id' => $request->year_id,
                    'class_id' => $request->class_id,
                    'assign_subject_id' => $request->assign_subject_id,
                    'exam_type_id' => $request->exam_type_id,
                    'student_id' => $request->student_id[$i],
                    'id_no' => $request->id_no[$i],
                    'marks' => $request->marks[$i],
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        $notification = array(
            'message' => 'Student marks inserted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function EditMarksView(){
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $subjects = Subject::all();
        $exam_type = ExamType::all();

        return view('admin.student.marks.marks_edit',compact('years','classes','subjects','exam_type'));
    }

    public function EditSubjectMarks(Request $request){
        $class_id = $request->class_id;
        $year_id = $request->year_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;

        $all_marks = StudentMark::with('student')->where('class_id',$class_id)->where('year_id',$year_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();

        return response()->json($all_marks);
    }


    public function UpdateSubjectMarks(Request $request){
        $studentCount = count($request->student_id);

        $class_id = $request->class_id;
        $year_id = $request->year_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;

        StudentMark::with('student')->where('class_id',$class_id)->where('year_id',$year_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->delete();

        if ($studentCount) {
            for ($i=0; $i < $studentCount; $i++) {
                $data = new StudentMark();
                $data->year_id=$request->year_id;
                $data->class_id=$request->class_id;
                $data->assign_subject_id=$request->assign_subject_id;
                $data->exam_type_id=$request->exam_type_id;
                $data->student_id=$request->student_id[$i];
                $data->id_no=$request->id_no[$i];
                $data->marks=$request->marks[$i];
                $data->save();
            }
        }

        $notification = array(
            'message' => 'Student Marks Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllMarksShow(){
        $student_mark = StudentMark::all();
        return view('admin.student.marks.all_marks',compact('student_mark'));
    }

    public function AllMarksDelete($id){
        $student_mark = StudentMark::find($id);
        $student_mark->delete();

        $notification = array(
            'message' => 'Student Marks Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
