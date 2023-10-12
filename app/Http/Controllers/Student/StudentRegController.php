<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\Discount;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Image;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentRegController extends Controller
{
    public function studentReg(){
        $assign_stu = AssignStudent::with('student','class','year')->get();
        $years = StudentYear::all();
        $classes = StudentClass::all();
        return view('admin.student.student_register.student_register',compact('assign_stu' ,'years','classes'));
    }

    public function studentAdd(){
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $shifts = StudentShift::all();
        $groups = StudentGroup::all();
        return view('admin.student.student_register.student_add',compact('years','classes','shifts','groups'));
    }

    public function studentRegStore(Request $request){

        $this->validate($request,[
            'year_id' => 'required'
        ]);
        DB::transaction(function () use($request){
            $check_year = StudentYear::find($request->year_id)->year_name;
            $student = User::where('userType','student')->orderBy('id','DESC')->first();

            if ($student == null){
                $firstId = 0;
                $studentId = $firstId+1;

                if ($studentId < 10){
                    $id = '000'.$studentId;
                }elseif ($studentId < 100){
                    $id = '00'.$studentId;
                }elseif ($studentId < 1000){
                    $id = '0'.$studentId;
                }
            }else{
                $student = User::where('userType','student')->orderBy('id','DESC')->first()->id;
                $studentId = $student+1;

                if ($studentId < 10){
                    $id = '000'.$studentId;
                }elseif ($studentId < 100){
                    $id = '00'.$studentId;
                }elseif ($studentId < 1000){
                    $id = '0'.$studentId;
                }
            }


            $final_id = $check_year.$id;
            $code = rand(0000,9999);
            $user = new User();
            $user->id_no = $final_id;
            $user->code = $code;
            $user->password = bcrypt($code);
            $user->userType = 'student';
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));


            if ($request->hasFile('photo')){
                $img = $request->file('photo');
                $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(250,250)->save('upload/user/'.$unique_name);
            }
            $user->image = $unique_name;
            $user->save();

            $assign_stu = new AssignStudent();
            $assign_stu->student_id = $user->id;
            $assign_stu->year_id = $request->year_id;
            $assign_stu->class_id = $request->class_id;
            $assign_stu->group_id = $request->group_id;
            $assign_stu->shift_id = $request->shift_id;
            $assign_stu->save();

            $discount = new Discount();
            $discount->assign_student_id = $assign_stu->id;
            $discount->category_fee_id = '1';
            $discount->discount = $request->discount;
            $discount->save();


        });

        $notification = array(
            'message' => 'Student Registration Successfully Done',
            'alert_type' => 'success'
        );
        return redirect()->route('student.reg')->with($notification);
    }


    public function studentRegSearch(Request $request){
        $assign_stu = AssignStudent::with('student','class','year')->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        $years = StudentYear::all();
        $classes = StudentClass::all();
        return view('admin.student.student_register.student_register',compact('assign_stu' ,'years','classes'));
    }



    public function studentRegEdit($student_id){
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $shifts = StudentShift::all();
        $groups = StudentGroup::all();

        $edit_data = AssignStudent::with('student','discount','year','class')->where('student_id',$student_id)->first();

        return view('admin.student.student_register.student_edit',compact('years','classes','shifts','groups','edit_data'));
    }


    public function studentRegUpdate(Request $request,$student_id){
        DB::transaction(function () use($request,$student_id){
            $update_data = User::where('id',$student_id)->first();
            $update_data->name = $request->name;
            $update_data->phone = $request->phone;
            $update_data->address = $request->address;
            $update_data->email = $request->email;
            $update_data->gender = $request->gender;
            $update_data->fname = $request->fname;
            $update_data->mname = $request->mname;

            if ($request->hasFile('photo')){
                $img = $request->file('photo');
                $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(250,250)->save('upload/user/'.$unique_name);
                unlink('upload/user/'.$request->old_photo);
            }else{
                $unique_name = $request->old_photo;
            }


            $update_data->image = $unique_name;
            $update_data->dob = $request->dob;
            $update_data->religion = $request->religion;
            $update_data->save();

            $assign_stu = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();

            $assign_stu->year_id = $request->year_id;
            $assign_stu->class_id = $request->class_id;
            $assign_stu->group_id = $request->group_id;
            $assign_stu->shift_id = $request->shift_id;
            $assign_stu->save();

            $discount = Discount::where('assign_student_id',$request->id)->first();
            $discount->assign_student_id = $request->id;
            $discount->category_fee_id = '1';
            $discount->discount = $request->discount;
            $discount->save();



        });

        $notification = array(
            'message' => 'Student Registration Updated Successfully',
            'alert_type' => 'success'
        );

        return redirect()->route('student.reg')->with($notification);
    }


    public function studentRegDelete($id){
        $delete_student = AssignStudent::find($id);
        $delete_student->delete();

        $delete_user = User::where('id',$delete_student->student_id)->first();
        $delete_user->delete();

        $notification = array(
            'message' => 'Student Registration Deleted Successfully',
            'alert_type' => 'warning'
        );

        return redirect()->route('student.reg')->with($notification);

    }

    //student_details promotion
    public function studentPromotion($student_id){
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $shifts = StudentShift::all();
        $groups = StudentGroup::all();

        $edit_data = AssignStudent::with('student','discount','year','class')->where('student_id',$student_id)->first();
        return view('admin.student.student_register.student_promotion',compact('edit_data','groups','shifts','classes','years'));
    }

    public function studentPromotionUpdate(Request $request,$student_id){
        DB::transaction(function () use($request,$student_id){
            $discount = Discount::where('assign_student_id',$request->assign_id)->first();
            $discount->discount = $request->discount;
            $discount->save();

            $assign = AssignStudent::where('id',$request->assign_id)->where('student_id',$student_id)->first();
            $assign->year_id = $request->year_id;
            $assign->class_id = $request->class_id;
            $assign->group_id = $request->group_id;
            $assign->shift_id = $request->shift_id;
            $assign->save();
        });

        $notification = array(
            'message' => 'Student Promotion Successfully Updated',
            'alert_type' => 'success',
        );

        return redirect()->route('student.reg')->with($notification);

    }

    //student_details details PDF

    public function StudentPDFView($student_id){
       $data = AssignStudent::with('student','discount','year','class','group','shift')->where('student_id',$student_id)->first();

        $pdf = PDF::loadView('admin.student.student_details.student_details_pdf',compact('data'));

        return $pdf->download('details.pdf');

    }

}
