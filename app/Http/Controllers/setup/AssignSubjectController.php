<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function assignSubject(){
        $assignSub = AssignSubject::with('class')->select('class_id')->groupBy('class_id')->get();
        return view('admin.setup.assign_subject.assign_subject',compact('assignSub'));
    }

    public function addAssignSubject(){
        $classes = StudentClass::all();
        $subjects = Subject::all();
        return view('admin.setup.assign_subject.add_assign_sub',compact('classes','subjects'));
    }

    public function StoreAssignSubject(Request $request){
        $this->validate($request,[
            'class_id' => 'required',
            'subject_id' => 'required',
            'full_mark' => 'required',
            'pass_mark' => 'required',
            'subjective_mark' => 'required'
        ]);
        $count_sub = count($request->subject_id);

            for ($i=0; $i<$count_sub; $i++){
                AssignSubject::insert([
                    'class_id' => $request->class_id,
                    'subject_id' => $request->subject_id[$i],
                    'full_mark' => $request->full_mark[$i],
                    'pass_mark' => $request->pass_mark[$i],
                    'subjective_mark' => $request->subjective_mark[$i],
                    'created_at' => Carbon::now(),
                ]);

            }


        $notification = array(
            'message' => 'Subject Assign Successfully',
            'alert_type' => 'success',
        );

        return redirect()->route('assign_subject')->with($notification);
    }



    public function EditAssignSubject($classId){
        $assign_all = AssignSubject::where('class_id',$classId)->get();
        $assign_single = AssignSubject::where('class_id',$classId)->first();
        $classes = StudentClass::all();
        $subjects = Subject::all();
        return view('admin.setup.assign_subject.edit_assign_sub',compact('assign_all','assign_single','classes','subjects'));
    }


    public function UpdateAssignSubject(Request $request,$classId){
        $count = count($request->subject_id);

        if ($count != NULL){
            AssignSubject::where('class_id',$classId)->delete();
            for ($i=0; $i<$count; $i++){
                $assign_sub_data = new AssignSubject();
                $assign_sub_data->class_id = $request->class_id;
                $assign_sub_data->subject_id = $request->subject_id[$i];
                $assign_sub_data->full_mark = $request->full_mark[$i];
                $assign_sub_data->pass_mark = $request->pass_mark[$i];
                $assign_sub_data->subjective_mark = $request->subjective_mark[$i];
                $assign_sub_data->save();
            }

            $notification = array(
                'message' => 'Subject Assign Update Successfully',
                'alert_type' => 'success',
            );

            return redirect()->route('assign_subject')->with($notification);
        }else{
            $notification = array(
                'message' => 'At least one Subject need to Assign',
                'alert_type' => 'error',
            );

            return redirect()->route('assign_subject')->with($notification);
        }

    }



    public function DeleteAssignSubject($classId){
        AssignSubject::where('class_id',$classId)->delete();

        $notification = array(
            'message' => 'Subject Assign Deleted Successfully',
            'alert_type' => 'warning',
        );

        return redirect()->back()->with($notification);
    }


    public function DetailsAssignSubject($classId){
        $assign_sub = AssignSubject::where('class_id',$classId)->get();
        $assign_class = AssignSubject::where('class_id',$classId)->first();
        return view('admin.setup.assign_subject.details_assign_sub',compact('assign_sub','assign_class'));
    }



}
