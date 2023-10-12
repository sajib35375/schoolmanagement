<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MonthlySalaryController extends Controller
{
    public function monthlySalary(Request $request){

        $date = date('Y-m',strtotime($request->date));
        $pay_date = $request->date;
        $all_data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->where('date','like',"%$date%")->get();

        return view('admin.employee.monthly_salary.monthly_salary',compact('all_data','date','pay_date'));
    }

    public function monthlyPaySlipEmployee($employee_id,$date){

        $pay_slip = EmployeeAttendance::where('employee_id',$employee_id)->where('date','like',"%$date%")->first();
        $count_absent = EmployeeAttendance::where('employee_id',$employee_id)->where('date','like',"%$date%")->where('attend_status','Absent')->count();

        $pdf = PDF::loadView('admin.employee.monthly_salary.monthly_pay_slip',compact('pay_slip','count_absent','employee_id'));
        return $pdf->download('details.pdf');

    }




}
