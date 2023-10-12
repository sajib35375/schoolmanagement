<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userView(){
        $all_user = User::where('userType','Admin')->get();
        return view('admin.user.user',compact('all_user'));
    }

    public function userAdd(){
        return view('admin.user.add_user');
    }

    public function userStore(Request $request){
        $this->validate($request,[
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',

        ]);
        $code = rand(0000000,9999999);
        User::insert([
            'userType' => 'Admin',
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($code),
            'code' => $code,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert_type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }


    public function userEdit($id){
        $edit_user = User::find($id);
        return view('admin.user.edit_user',compact('edit_user'));
    }

    public function userUpdate(Request $request,$id){
        $update_user = User::find($id);

        $update_user->role = $request->role;
        $update_user->name = $request->name;
        $update_user->email = $request->email;
        $update_user->updated_at = Carbon::now();
        $update_user->update();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert_type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }


    public function userDelete($id){
        $delete_user = User::find($id);
        $delete_user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert_type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }







}
