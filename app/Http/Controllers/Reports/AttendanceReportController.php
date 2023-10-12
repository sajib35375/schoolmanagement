<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{
    public function attendanceReportView(){
        $all_employee = User::where('userType','employee')->get();
        return view('admin.reports.attendance.attendance_report',compact('all_employee'));
    }

    public function attendanceReportPDF(Request $request){
        $date = date('Y-m',strtotime($request->date));
        $employee_id = $request->employee_id;

        if ($date!='') {
            $where[] = ['employee_id',$employee_id];
        }
        if ($date!='') {
            $where[] = ['date','like',$date.'%'];
        }
        // dd($date);
        // dd($request->employee_id);
        $single_attend = EmployeeAttendance::where($where)->get();

        if ($single_attend==true) {
            $all_data = EmployeeAttendance::with('user')->where($where)->get();
            $all_absent = EmployeeAttendance::where($where)->where('attend_status','Absent')->get()->count();
            $all_leave = EmployeeAttendance::where($where)->where('attend_status','Leave')->get()->count();
            $month = date('Y-m',strtotime($request->date));

            $pdf = PDF::loadView('admin.reports.attendance.attend_pdf_reports',compact('all_data','all_absent','all_absent','all_leave','month'));

            return $pdf->download('attendance.pdf');
        }else{
            $notification = array(
                'message' => 'Sorry,We are not able to Generate PDF',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}
