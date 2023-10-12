<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use App\Models\EmployeeRegsistration;
use App\Models\LeavePurpose;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{

    public function employeeLeave(){
        $all_employee = User::where('userType','employee')->get();
        $leaves = EmployeeLeave::all();
        $purposes = LeavePurpose::all();
        return view('admin.employee.employee_leave.employee_leave',compact('all_employee','purposes','leaves'));
    }


    public function employeeLeaveStore(Request $request){
        $this->validate($request,[
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($request->purpose_id=='0'){
            $purpose = new LeavePurpose();
            $purpose->name = $request->new_purpose;
            $purpose->save();

            $leave = new EmployeeLeave();
            $leave->employee_id = $request->employee_id;
            $leave->purpose_id = $purpose->id;
            $leave->start_date = $request->start_date;
            $leave->end_date = $request->end_date;
            $leave->save();

        }else{
            $leave = new EmployeeLeave();
            $leave->employee_id = $request->employee_id;
            $leave->purpose_id = $request->purpose_id;
            $leave->start_date = $request->start_date;
            $leave->end_date = $request->end_date;
            $leave->save();
        }



        $notification = array(
            'message' => 'Employee Leave Added Successfully',
            'alert_type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function employeeLeaveEdit($id){
        $all_employee = User::where('userType','employee')->get();
        $purposes = LeavePurpose::all();
        $edit_data = EmployeeLeave::find($id);
        return view('admin.employee.employee_leave.employee_leave_edit',compact('all_employee','purposes','edit_data'));
    }

    public function employeeLeaveUpdate(Request $request,$id){
        if ($request->purpose_id == '0' ){
            $leave_update = new LeavePurpose();
            $leave_update->name = $request->new_purpose;
            $leave_update->save();

            $update_employee = EmployeeLeave::find($id);
            $update_employee->employee_id = $request->employee_id;
            $update_employee->purpose_id = $leave_update->id;
            $update_employee->start_date = $request->start_date;
            $update_employee->end_date = $request->end_date;
            $update_employee->update();

        }else{
            $update_employee = EmployeeLeave::find($id);
            $update_employee->employee_id = $request->employee_id;
            $update_employee->purpose_id = $request->purpose_id;
            $update_employee->start_date = $request->start_date;
            $update_employee->end_date = $request->end_date;
            $update_employee->update();
        }


        $notification = array(
            'message' => 'Employee Leave Updated Successfully',
            'alert_type' => 'success',
        );

        return redirect()->route('employee.leave')->with($notification);


    }

    public function employeeLeaveDelete($id){
        $delete_employee = EmployeeLeave::find($id);
        $delete_employee->delete();

        $notification = array(
            'message' => 'Employee Leave Deleted Successfully',
            'alert_type' => 'warning',
        );

        return redirect()->back()->with($notification);
    }


}
