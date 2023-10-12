<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function designation(){
        $designation = Designation::all();
        return view('admin.setup.designation.designation',compact('designation'));
    }

    public function designationStore(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);

        Designation::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Data Inserted Successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function designationEdit($id){
        return $edit_data = Designation::find($id);
    }


    public function designationUpdate(Request $request){
        $id = $request->update_id;
        $update_data = Designation::find($id);
        $update_data->name = $request->name;
        $update_data->updated_at = Carbon::now();
        $update_data->update();

        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    public function designationDelete($id){
        $delete_data = Designation::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert_type' => 'warning',
        );
        return redirect()->back()->with($notification);
    }






}
