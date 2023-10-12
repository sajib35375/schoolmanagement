<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Models\EmployeeSalary;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;

class EmployeeAccountController extends Controller
{
    public function EmployeeAccountView(){
        $all_employee_salary = EmployeeSalary::with('employee')->get();
        return view('admin.employee.employee_account.employee_account',compact('all_employee_salary'));
    }

    public function EmployeeAccountAdd(){
        return view('admin.employee.employee_account.add_employee_account');
    }

    public function EmployeeAccountGet(Request $request){
        $date = date('Y-m',strtotime($request->date));
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	    }

    	 $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
    	 // dd($allStudent);
    	 $html['thsource']  = '<th>SL</th>';
    	 $html['thsource'] .= '<th>ID NO</th>';
    	 $html['thsource'] .= '<th>Employee Name</th>';
    	 $html['thsource'] .= '<th>Basic Salary</th>';
    	 $html['thsource'] .= '<th>Salary This Month</th>';
    	 $html['thsource'] .= '<th>Select</th>';


    	 foreach ($data as $key => $attend) {

    	 	$account_salary = EmployeeSalary::where('employee_id',$attend->employee_id)->where('date',$date)->first();

    	 	if($account_salary !=null) {
			 	$checked = 'checked';
			 }else{
			 	$checked = '';
			 }

    	 	$totalattend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
    	 	$absentcount = count($totalattend->where('attend_status','Absent'));


 	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['id_no'].'<input type="hidden" name="date" value="'.$date.'" >'.'</td>';

 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';


 	$salary = (float)$attend['user']['salary'];
 	$salaryperday = (float)$salary/30;
 	$totalsalaryminus = (float)$absentcount*(float)$salaryperday;
 	$totalsalary = (float)$salary-(float)$totalsalaryminus;

 	$html[$key]['tdsource'] .='<td>'.$totalsalary.'<input type="hidden" name="salary[]" value="'.$totalsalary.'" >'.'</td>';


 	$html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>';

      }  // end foreach
    	return response()->json(@$html);
    }

    public function EmployeeAccountStore(Request $request){
        $date = date('Y-m', strtotime($request->date));

    	EmployeeSalary::where('date',$date)->delete();

    	$checkdata = $request->checkmanage;

    	if ($checkdata !=null) {
    		for ($i=0; $i <count($checkdata) ; $i++) {
    			$data = new EmployeeSalary();
    			$data->date = $date;
    			$data->employee_id = $request->employee_id[$checkdata[$i]];
    			$data->salary = $request->salary[$checkdata[$i]];
    			$data->save();
    		}
    	} // end if

    	if (!empty(@$data) || empty($checkdata)) {

    	$notification = array(
    		'message' => 'Well Done Data Successfully Updated',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.salary.view')->with($notification);
    	}else{

    		$notification = array(
    		'message' => 'Sorry Data not Saved',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    	}
    }
}
