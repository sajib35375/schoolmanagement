<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function feeCategory(){
        $fee_cat = FeeCategory::all();
        return view('admin.setup.fee_category.fee_category',compact('fee_cat'));
    }

    public function feeCategoryStore(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:fee_categories',
        ]);

        FeeCategory::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Fee Category Added Successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function feeCategoryEdit($id){
        return $edit_fee = FeeCategory::find($id);
    }


    public function feeCategoryUpdate(Request $request){
        $id = $request->fee_update_id;
        $update_cat = FeeCategory::find($id);
        $update_cat->name = $request->name;
        $update_cat->updated_at = Carbon::now();
        $update_cat->update();

        $notification = array(
            'message' => 'Fee Category updated Successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    public function feeCategoryDelete($id){
        $delete_fee = FeeCategory::find($id);
        $delete_fee->delete();

        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert_type' => 'warning',
        );
        return redirect()->back()->with($notification);
    }





}
