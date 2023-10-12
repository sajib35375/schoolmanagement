<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class RollGenerateController extends Controller
{
    public function rollGenerator(){
        $years = StudentYear::all();
        $classes = StudentClass::all();

        return view('admin.student.roll_generate.roll_generate',compact('years','classes'));
    }
    public function rollShow(Request $request){
        $all_data = AssignStudent::with('student')->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return response()->json($all_data);
    }

    public function rollGenerateStore(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        if ($request->student_id != null){
            for ($i=0;$i<count($request->student_id);$i++){
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['role_id'=>$request->roll[$i]]);
            }

        }else{
            $notification = array(
                'message' => 'At least one student need to generate his/her roll',
                'alert_type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => 'Student Roll updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
