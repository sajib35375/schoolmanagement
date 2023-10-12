<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function examType(){
        $exam = ExamType::all();
        return view('admin.setup.exam_type.exam_type',compact('exam'));
    }

    public function examTypeStore(Request $request){
        $this->validate($request,[
            'exam_type' => 'required',
        ]);

        ExamType::insert([
            'exam_type' => $request->exam_type,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Data Inserted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function examTypeEdit($id){
       return $edit_exam = ExamType::find($id);
    }


    public function examTypeUpdate(Request $request){
        $id = $request->exam_update_id;
        $update_exam = ExamType::find($id);
        $update_exam->exam_type = $request->exam_type;
        $update_exam->updated_at = Carbon::now();
        $update_exam->update();

        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function examTypeDelete($id){
        $delete_exam = ExamType::find($id);
        $delete_exam->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert_type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }








}
