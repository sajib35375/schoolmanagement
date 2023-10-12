<?php

namespace App\Http\Controllers;

use App\Models\OtherCost;
use Illuminate\Http\Request;
use Image;

class OtherCostController extends Controller
{
    public function OtherCostView(){
        $allData = OtherCost::all();
        return view('admin.other_cost.other_cost',compact('allData'));
    }

    public function OtherCostAdd(){
        return view('admin.other_cost.add_other_cost');
    }

    public function OtherCostStore(Request $request){
        $this->validate($request,[
            'date' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('images/other_cost/'.$unique_name);
        }

        OtherCost::insert([
            'date' => $request->date,
            'amount' => $request->amount,
            'description' => $request->description,
            'image' => $unique_name,
        ]);

        $notification = array(
            'message' => 'Other Cost Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('other.cost.view')->with($notification);
    }

    public function OtherCostEdit($id){
        $edit_cost = OtherCost::find($id);
        return view('admin.other_cost.edit_other_cost',compact('edit_cost'));
    }

    public function OtherCostUpdate(Request $request,$id){
        $edit_cost = OtherCost::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('images/other_cost/'.$unique_name);
        }else{
            $unique_name = $request->old_image;
        }

        $edit_cost->date = date('Y-m-d',strtotime($request->date));
        $edit_cost->amount = $request->amount;
        $edit_cost->description = $request->description;
        $edit_cost->image = $unique_name;
        $edit_cost->update();


        $notification = array(
            'message' => 'Other Cost Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('other.cost.view')->with($notification);
    }

    public function OtherCostDelete($id){
        $delete_cost = OtherCost::find($id);
        $delete_cost->delete();

        $notification = array(
            'message' => 'Other Cost Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
