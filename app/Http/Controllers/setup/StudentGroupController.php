<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function studentGroup(){
        $group = StudentGroup::all();
        return view('admin.setup.student_group.student_group',compact('group'));
    }

    public function studentGroupStore(Request $request){
        $this->validate($request,[
            'group_name' => 'required|unique:student_groups',
        ]);

        StudentGroup::insert([
            'group_name' => $request->group_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Student Group Added Successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function studentGroupEdit($id){
        return $edit_data = StudentGroup::find($id);
    }

    public function studentGroupUpdate(Request $request){
        $id = $request->group_update_id;
        $update_group = StudentGroup::find($id);
        $update_group->group_name = $request->group_name;
        $update_group->updated_at = Carbon::now();
        $update_group->update();

        $notification = array(
            'message' => 'Student Group Update Successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function studentGroupDelete($id){
        $delete_data = StudentGroup::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert_type' => 'warning',
        );
        return redirect()->back()->with($notification);
    }







}
