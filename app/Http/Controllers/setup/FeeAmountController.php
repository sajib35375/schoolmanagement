<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function feeAmount(){
        $amount = FeeAmount::with('fee_category')->select('fee_id')->groupBy('fee_id')->get();

        return view('admin.setup.fee_amount.fee_amount',compact('amount'));
    }

    public function AddFeeAmount(){
        $fee_cat = FeeCategory::all();
        $classes = StudentClass::all();
        $years = StudentYear::all();
        return view('admin.setup.fee_amount.add_fee_amount',compact('fee_cat','classes','years'));
    }

    public function feeAmountStore(Request $request){
        $this->validate($request,[
            'fee_id' => 'required',
        ]);

        $count = count($request->class_id);
        if ( $count != NULL ){
            for ($i=0; $i<$count; $i++){
                FeeAmount::insert([
                    'fee_id' => $request->fee_id,
                    'class_id' => $request->class_id[$i],
                    'year_id' => $request->year_id[$i],
                    'amount' => $request->amount[$i],
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        $notification = array(
            'message' => 'Amount Added Successfully',
            'alert_type' => 'success',
        );

        return redirect()->route('fee.amount')->with($notification);

    }


    public function feeAmountEdit($fee_id){
        $edit_category = FeeAmount::where('fee_id',$fee_id)->first();
        $edit_data = FeeAmount::where('fee_id',$fee_id)->get();

        $fee_cat = FeeCategory::all();
        $classes = StudentClass::all();
        $years = StudentYear::all();

        return view('admin.setup.fee_amount.edit_fee_amount',compact('edit_category','years','edit_data','fee_cat','classes'));
    }

    public function feeAmountUpdate(Request $request,$fee_id){

        if ($request->class_id == NULL){

            $notification = array(
                'message' => 'You must have at list one amount and class',
                'alert_type' => 'error',
            );

            return redirect()->back()->with($notification);

        }else{

            $count_class = count($request->class_id);
            FeeAmount::where('fee_id',$fee_id)->delete();
            for ($i=0; $i<$count_class; $i++){
                $update_data = new FeeAmount();
                $update_data->fee_id = $request->fee_id;
                $update_data->class_id = $request->class_id[$i];
                $update_data->year_id = $request->year_id[$i];
                $update_data->amount = $request->amount[$i];
                $update_data->created_at = Carbon::now();
                $update_data->save();
            }
            $notification = array(
                'message' => 'Data Updated Successfully',
                'alert_type' => 'success',
            );
            return redirect()->route('fee.amount')->with($notification);
        }
    }

    public function feeAmountDelete($fee_id){
         FeeAmount::where('fee_id',$fee_id)->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert_type' => 'warning',
        );

        return redirect()->route('fee.amount')->with($notification);

    }

    public function feeAmountDetails($fee_id){
        $details = FeeAmount::with('studentClass','studentYear')->where('fee_id',$fee_id)->orderBy('class_id','ASC')->get();
        return view('admin.setup.fee_amount.fee_amount_details',compact('details'));
    }


}
