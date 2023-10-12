<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalary;
use App\Models\OtherCost;
use App\Models\OtherFeeSubmit;
use App\Models\StudentFee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CalculateProfitController extends Controller
{
    public function ProfitView(Request $request){
        $start_date = date('Y-m',strtotime($request->start_date));
        $end_date = date('Y-m',strtotime($request->end_date));
        $sdate = $request->start_date;
        $edate = $request->end_date;
        $employee_salary = EmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('salary');
        $student_fee = StudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $other_fee = OtherFeeSubmit::whereBetween('date',[$sdate,$edate])->sum('amount');
        $other_cost = OtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');
        $total_cost = $employee_salary + $other_cost;
        $total_profit = $student_fee + $other_fee - $total_cost;

        return view('admin.reports.profit.profit',compact('start_date','end_date','other_fee','sdate','edate','employee_salary','student_fee','other_cost','total_cost','total_profit'));
    }

    public function ProfitPDFView($start_date,$end_date,$sdate,$edate){
        $employee_salary = EmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('salary');
        $student_fee = StudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $other_fee = OtherFeeSubmit::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $other_cost = OtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');
        $total_cost = $employee_salary + $other_cost;
        $total_profit = $student_fee + $other_fee - $total_cost;

        $pdf = PDF::loadView('admin.reports.profit.profit_pdf',compact('employee_salary','student_fee','other_cost','total_cost','total_profit'));
        return $pdf->download('profit.pdf');
    }
}
