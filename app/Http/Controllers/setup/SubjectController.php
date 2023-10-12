<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function subjectView(){
        $subject = Subject::all();
        return view('admin.setup.subject.subject',compact('subject'));
    }

    public function subjectStore(Request $request){
        $this->validate($request,[
            'subject' => 'required',
        ]);

        Subject::insert([
            'subject' => $request->subject,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Subject Added Successfully',
            'alert_type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    public function subjectEdit($id){
        return $sub_edit = Subject::find($id);
    }


    public function subjectUpdate(Request $request){
        $id = $request->sub_update_id;
        $sub_update = Subject::find($id);
        $sub_update->subject = $request->subject;
        $sub_update->updated_at = Carbon::now();
        $sub_update->update();

        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert_type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    public function subjectDelete($id){
        $delete_sub = Subject::find($id);
        $delete_sub->delete();

        $notification = array(
            'message' => 'Subject Deleted Successfully',
            'alert_type' => 'warning',
        );

        return redirect()->back()->with($notification);
    }









}
