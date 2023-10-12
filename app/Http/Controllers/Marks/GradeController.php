<?php

namespace App\Http\Controllers\Marks;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function StudentGradeView(){
        $all_grade = Grade::all();
        return view('admin.student.marks.student_grade',compact('all_grade'));
    }

    public function AddNewGrade(){
        return view('admin.student.marks.add_new_grade');
    }

    public function StoreNewGrade(Request $request){
        $this->validate($request,[
            'grade_name' => 'required',
            'grade_point' => 'required',
            'start_marks' => 'required',
            'end_marks' => 'required',
            'start_point' => 'required',
            'end_point' => 'required',
            'remarks' => 'required',
        ]);

        Grade::insert([
            'grade_name' => $request->grade_name,
            'grade_point' => $request->grade_point,
            'start_marks' => $request->start_marks,
            'end_marks' => $request->end_marks,
            'start_point' => $request->start_point,
            'end_point' => $request->end_point,
            'remarks' => $request->remarks,
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Student Grade Inserted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('student.grade.view')->with($notification);
    }

    public function EditGrade($id){
        $edit_grade = Grade::find($id);
        return view('admin.student.marks.grade_edit',compact('edit_grade'));
    }

    public function UpdateGrade(Request $request,$id){
        $update_grade = Grade::find($id);
        $update_grade->grade_name = $request->grade_name;
        $update_grade->grade_point = $request->grade_point;
        $update_grade->start_marks = $request->start_marks;
        $update_grade->end_marks = $request->end_marks;
        $update_grade->start_point = $request->start_point;
        $update_grade->end_point = $request->end_point;
        $update_grade->remarks = $request->remarks;
        $update_grade->update();

        $notification = array(
            'message' => 'Student Grade Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('student.grade.view')->with($notification);
    }

    public function DeleteGrade($id){
        $delete_grade = Grade::find($id);
        $delete_grade->delete();

        $notification = array(
            'message' => 'Student Grade Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
