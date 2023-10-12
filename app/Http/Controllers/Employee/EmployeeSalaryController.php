<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeRegsistration;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function employeeSalary(){
        $all_data = User::where('userType','employee')->get();
        return view('admin.employee.employee_salary.employee_salary',compact('all_data'));
    }


    public function SalaryIncrement($id){
       return $edit_data = User::where('id',$id)->first();
    }


    public function SalaryIncrementUpdate(Request $request){
        $id = $request->update_id;

        $user = User::find($id);
        $previous_salary = $user->salary;
        $increment_amount = $request->amount;
        $present_salary = $previous_salary + $increment_amount;
        $user->salary = $present_salary;
        $user->update();

        $employee = new EmployeeRegsistration();
        $employee->employee_id = $id;
        $employee->previous_salary = $previous_salary;
        $employee->increment_salary = $increment_amount;
        $employee->present_salary = $present_salary;
        $employee->effected_salary = $request->effected;
        $employee->save();

        $notification = array(
            'message' => 'Salary Incremented Successfully',
            'alert_type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function SalaryIncrementDetails($id){
        $user = User::find($id);
        $all_data = EmployeeRegsistration::where('employee_id',$id)->get();

        return view('admin.employee.employee_salary.salary_increment_details',compact('user','all_data'));
    }



}
