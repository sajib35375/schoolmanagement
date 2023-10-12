<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function EmployeeAttendance(){
        $all_data = EmployeeAttendance::select('date')->groupBy('date')->get();
        $data = EmployeeAttendance::select('date')->groupBy('date')->first();
        return view('admin.employee.employee_attendance.employee_attendance',compact('all_data','data'));
    }

    public function AddAttendance(){
        $employees = User::where('userType','employee')->get();
        return view('admin.employee.employee_attendance.add_employee_attend',compact('employees'));
    }

    public function EmployeeAttendanceStore(Request $request){

        $count_id = count($request->employee_id);
        for ( $i=0; $i<$count_id; $i++ ){
           $attend_status = 'attend_status'.$i; // need to discous
            $data = new EmployeeAttendance();
            $data->employee_id = $request->employee_id[$i];
            $data->date = $request->date;
            $data->attend_status = $request->$attend_status;
            $data->save();

        }

        $notification = array(
            'message' => 'Employee Attendance Added Successfully',
            'alert_type' => 'success',
        );

        return redirect()->route('employee.attendance')->with($notification);
    }


    public function EmployeeAttendanceEdit($date){
        $edit_data = User::where('userType','employee')->get();
        $attend = EmployeeAttendance::where('date',$date)->get();
        $data = EmployeeAttendance::where('date',$date)->first();
        return view('admin.employee.employee_attendance.edit_employee_attend',compact('edit_data','data','attend'));
    }


    public function EmployeeAttendanceUpdate(Request $request){
       $date = $request->update_date;
       EmployeeAttendance::where('date',$date)->delete();
       $count = count($request->employee_id);
       for ( $i=0; $i < $count; $i++ ){
           $attend_status = 'attend_status'.$i;
           $data = new EmployeeAttendance();
           $data->employee_id = $request->employee_id[$i];
           $data->date = $request->date;
           $data->attend_status = $request->$attend_status;
           $data->save();
       }

        $notification = array(
            'message' => 'Employee Attendance Updated Successfully',
            'alert_type' => 'success',
        );

        return redirect()->route('employee.attendance')->with($notification);

    }

    public function EmployeeAttendanceDetails($date){
        $details = EmployeeAttendance::where('date',$date)->get();
        return view('admin.employee.employee_attendance.employee_attendance_details',compact('details'));
    }







}
