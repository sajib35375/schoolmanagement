<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function StudentClass(){
        $class = StudentClass::all();
        return view('admin.setup.student_class.student_class',compact('class'));
    }

    public function StudentClassStore(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:student_classes',
        ]);

        StudentClass::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Data Inserted Successfully',
            'alert_type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function StudentClassEdit($id){

      return $edit_student = StudentClass::find($id);
    }

    public function StudentClassUpdate(Request $request){
        $id = $request->update_id;
        $update_student = StudentClass::find($id);
        $update_student->name = $request->name;
        $update_student->updated_at = Carbon::now();
        $update_student->update();

        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert_type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function StudentClassDelete($id){
        $delete_student = StudentClass::find($id);
        $delete_student->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert_type' => 'warning',
        );

        return redirect()->back()->with($notification);
    }


}
