<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\FeeAmount;
use App\Models\OtherFee;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function studentFee(Request $request){
        $classes = StudentClass::all();
        $years = StudentYear::all();
        $all_data = AssignStudent::with('discount')->where('class_id',$request->class_id)->where('year_id',$request->year_id)->get();
        $fee_data = FeeAmount::where('fee_id',3)->where('class_id',$request->class_id)->first();

        return view('admin.student.student_fee.student_fee',compact('classes','years','all_data','fee_data'));
    }


    public function paySlip($student_id,$class_id){
        $data = AssignStudent::with('student','discount')->where('class_id',$class_id)->where('student_id',$student_id)->first();
        $pdf = PDF::loadView('admin.student.student_fee.pay_slip',compact('data'));

        return $pdf->download('details.pdf');
    }


    public function studentMonthlyFee(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $month = $request->month;
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $data_get = AssignStudent::with('discount')->where('class_id',$class_id)->where('year_id',$year_id)->get();
        $fee = FeeAmount::where('fee_id',1)->where('class_id',$class_id)->first();

        return view('admin.student.student_monthly_fee.monthly_fee',compact('years','classes','data_get','fee','month'));
    }

    public function MonthlyPaySlip($student_id,$year_id,$class_id,$month){
        $data = AssignStudent::with('discount')->where('class_id',$class_id)->where('year_id',$year_id)->where('student_id',$student_id)->first();

        $pdf = PDF::loadView('admin.student.student_monthly_fee.monthly_pay_slip',compact('data','month'));

        return $pdf->download('Monthly_PaySlip.pdf');
    }


    public function ExamTypeFee(Request $request){
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $exam_type = ExamType::all();
        $exams = $request->exam;
        $all_data = AssignStudent::with('discount','student')->where('class_id',$request->class_id)->where('year_id',$request->year_id)->get();
        $fee = FeeAmount::where('fee_id',2)->where('class_id',$request->class_id)->first();
        return view('admin.student.exam_type.exam_type',compact('years','classes','exam_type','all_data','fee','exams'));
    }

    public function ExamWisePaySlip($student_id,$class_id,$year_id){
        $data = AssignStudent::with('discount','student')->where('student_id',$student_id)->where('class_id',$class_id)->where('year_id',$year_id)->first();
        // dd($data);
        $pdf = PDF::loadView('admin.student.exam_type.exam_type_pay_slip',compact('data'));
        return $pdf->download('Exam_type_PaySlip.pdf');

    }

    public function otherFee(){
        $classes = StudentClass::all();
        $years = StudentYear::latest()->get();
        return view('admin.student.other_fee.add_other_fee',compact('classes','years'));
    }

    public function otherFeeAll(){
        $other_fee = OtherFee::latest()->get();
        return view('admin.student.other_fee.other_fee_all',compact('other_fee'));
    }

    public function otherFeeEdit($id){
         $edit_data = OtherFee::find($id);
        $classes = StudentClass::all();
        $years = StudentYear::latest()->get();
        return view('admin.student.other_fee.other_fee_edit',compact('edit_data','classes','years'));
    }

    public function otherFeeUpdate(Request $request,$id){
        $update_data = OtherFee::find($id);
        $update_data->class_id = $request->class_id;
        $update_data->year_id = $request->year_id;
        $update_data->fee_name = $request->fee_name;
        $update_data->fee_amount = $request->fee_amount;
        $update_data->updated_at = Carbon::now();
        $update_data->update();

        $notification = array(
            'message' => 'Student Other Fee Updated Successfully Done',
            'alert_type' => 'success'
        );
        return redirect()->route('other.fee.all')->with($notification);
    }

    public function otherFeeDelete($id){
        $delete_data = OtherFee::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Student Other Fee Updated Successfully Done',
            'alert_type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function otherFeeStore(Request $request){
        $this->validate($request,[
            'class_id' => 'required',
            'year_id' => 'required'
        ]);

        $fee_count = count($request->fee_name);

        for ($i=0; $i< $fee_count; $i++){
            OtherFee::insert([
                'class_id' => $request->class_id,
                'year_id' => $request->year_id,
                'fee_name' => $request->fee_name[$i],
                'fee_amount' => $request->fee_amount[$i],
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Student Other Fee Added Successfully',
            'alert_type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function otherFeeView(Request $request){
        $classes = StudentClass::all();
        $years = StudentYear::latest()->get();
        $all_data = AssignStudent::with('discount')->where('class_id',$request->class_id)->where('year_id',$request->year_id)->get();
        $fee_data = OtherFee::where('class_id',$request->class_id)->where('year_id',$request->year_id)->sum('fee_amount');
        $other_type = OtherFee::where('class_id',$request->class_id)->where('year_id',$request->year_id)->get();

        $count = count($other_type);
        //dd($count);
        return view('admin.student.other_fee.search_other_fee',compact('years','classes','all_data','fee_data','count'));
    }

    public function otherFeePayslip($student_id,$class_id,$year_id){
        $data = AssignStudent::with('student','discount')->where('class_id',$class_id)->where('student_id',$student_id)->first();
        $fee_data = OtherFee::where('class_id',$class_id)->where('year_id',$year_id)->sum('fee_amount');
        $other_type = OtherFee::where('class_id',$class_id)->where('year_id',$year_id)->get();
        $count = count($other_type);
        $pdf = PDF::loadView('admin.student.other_fee.payslip_other_fee',compact('data','fee_data','count'));

        return $pdf->download('details.pdf');
    }


}
