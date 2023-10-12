<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\EmployeeRegsistration;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Image;

class EmployeeController extends Controller
{
    public function employeeReg(){
        $all_data = User::where('userType','employee')->get();
        return view('admin.employee.employee_reg',compact('all_data'));
    }

    public function AddEmployee(){
        $designations = Designation::all();
        return view('admin.employee.add_employee_reg',compact('designations'));
    }

    public function AddEmployeeStore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'join_date' => 'required',
            'salary' => 'required',
            'photo' => 'required',

        ]);
        DB::transaction(function () use($request){
            $user = User::where('userType','employee')->first();
            $date = date('Ym',strtotime(Carbon::now()));

            $first_id = 0;
            if ($user == ''){
                $employee_id = $first_id+1;

                if ($employee_id<10){
                    $id = '000'.$employee_id;
                }elseif($employee_id<100){
                    $id = '00'.$employee_id;
                }elseif($employee_id<1000){
                    $id = '0'.$employee_id;
                }
            }else{
                $employee = User::where('userType','employee')->orderBy('id','DESC')->first();
                $employee_id =$employee->id + 1;
//                dd($employee_id);
               if ($employee_id<10){
                   $id = '000'.$employee_id;
               }elseif($employee_id<100){
                   $id = '00'.$employee_id;
               }elseif($employee_id<1000){
                   $id = '0'.$employee_id;
               }
            }

            if ($request->hasFile('photo')){
                $img = $request->file('photo');
                $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(250,250)->save('images/employee/'.$unique_name);
            }


            $code = rand(0000,9999);
            $employee_user = new User();
            $employee_user->name = $request->name;
            $employee_user->code = $code;
            $employee_user->password = bcrypt($code);
            $employee_user->designation_id = $request->designation_id;
            $employee_user->religion = $request->religion;
            $employee_user->userType = 'employee';
            $employee_user->fname = $request->fname;
            $employee_user->mname = $request->mname;
            $employee_user->phone = $request->phone;
            $employee_user->address = $request->address;
            $employee_user->gender = $request->gender;
            $employee_user->dob = $request->dob;
            $employee_user->join_date = $request->join_date;
            $employee_user->id_no = $date.$id;
            $employee_user->salary = $request->salary;
            $employee_user->image = $unique_name;
            $employee_user->save();




            $employee = new EmployeeRegsistration();
            $employee->employee_id = $employee_user->id;
            $employee->previous_salary = $request->salary;
            $employee->present_salary = $request->salary;
            $employee->increment_salary = '0';
            $employee->effected_salary = date('Y-m-d',strtotime($request->join_date));
            $employee->save();
        });


        $notification = array(
            'message' => 'Employee Registration successfully',
            'alert_type' => 'success'
        );

        return redirect()->route('employee.reg')->with($notification);


    }


    public function EditEmployee($employee_id){
        $designations = Designation::all();
        $edit_data = User::where('id',$employee_id)->first();
        return view('admin.employee.edit_employee_reg',compact('edit_data','designations'));
    }


    public function DeleteEmployee($employee_id){
//        EmployeeRegsistration::with('employee')->where('employee_id',$employee_id)->delete();
        $delete_data = User::where('userType','employee')->where('id',$employee_id)->first();
        $delete_data->delete();

        $notification = array(
            'message' => 'Employee Deleted successfully',
            'alert_type' => 'warning'
        );

        return redirect()->route('employee.reg')->with($notification);
    }



    public function UpdateEmployee(Request $request,$employee_id){
        $update_employee = User::where('id',$employee_id)->first();

        if ($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(200,200)->save('images/employee/'.$unique_name);
        }else{
            $unique_name = $request->old_photo;
        }

        $update_employee->name = $request->name;
        $update_employee->fname = $request->fname;
        $update_employee->mname = $request->mname;
        $update_employee->phone = $request->phone;
        $update_employee->address = $request->address;
        $update_employee->gender = $request->gender;
        $update_employee->dob = $request->dob;
        $update_employee->religion = $request->religion;
        $update_employee->join_date = $request->join_date;
        $update_employee->salary = $request->salary;
        $update_employee->image = $unique_name;
        $update_employee->designation_id = $request->designation_id;
        $update_employee->update();




        $notification = array(
            'message' => 'Employee Updated successfully',
            'alert_type' => 'success'
        );

        return redirect()->route('employee.reg')->with($notification);

    }


    public function employeePdf($employee_id){
        $data = User::where('userType','employee')->where('id',$employee_id)->first();

        $pdf = PDF::loadView('admin.employee.employee_pdf_details',compact('data'));
        return $pdf->download('details.pdf');
    }








}
