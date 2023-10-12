<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function studentShift(){
        $shift = StudentShift::all();
        return view('admin.setup.student_shift.student_shift',compact('shift'));
    }

    public function studentShiftStore(Request $request){

        $this->validate($request,[
            'shift' => 'required|unique:student_shifts',
        ]);

        StudentShift::insert([
            'shift' => $request->shift,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Student Shift Inserted Successfully',
            'alert_type' => 'success',
        );

        return redirect()->back()->with($notification);

    }

    public function studentShiftEdit($id){
       return $edit_shift = StudentShift::find($id);
    }

    public function studentShiftUpdate(Request $request){
        $id = $request->shift_update_id;
        $update_data = StudentShift::find($id);

        $update_data->shift = $request->shift;
        $update_data->created_at = Carbon::now();
        $update_data->update();

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert_type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
    public function studentShiftDelete($id){
        $delete_data = StudentShift::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert_type' => 'warning',
        );
        return redirect()->back()->with($notification);

    }

}
