<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function studentYear(){
        $year = StudentYear::all();
        return view('admin.setup.student_year.student_year',compact('year'));
    }

    public function studentYearStore(Request $request){
        $this->validate($request,[
            'year_name' => 'required|unique:student_years',
        ]);

        StudentYear::insert([
            'year_name' => $request->year_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Student year Added Successfully',
            'alert_type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function studentYearEdit($id){
        return $edit_data = StudentYear::find($id);
    }

    public function studentYearUpdate(Request $request){
        $year_id = $request->year_update_id;
        $update_year = StudentYear::find($year_id);
        $update_year->year_name = $request->year_name;
        $update_year->updated_at = Carbon::now();
        $update_year->update();

        $notification = array(
            'message' => 'Student year Updated Successfully',
            'alert_type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function studentYearDelete($id){
        $delete_data = StudentYear::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert_type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

}
