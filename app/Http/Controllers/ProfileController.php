<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class ProfileController extends Controller
{
    public function ProfileView(){
        $data = User::find(Auth::id());
        return view('admin.user.profile.profile',compact('data'));
    }

    public function ProfileEdit(){
        $edit_data = User::find(Auth::id());
        return view('admin.user.profile.edit_profile',compact('edit_data'));
    }

    public function ProfileUpdate(Request $request){
        $update_data = User::find(Auth::id());

        if ($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(250,250)->save('upload/profile/'.$unique_name);
            @unlink('upload/profile/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }

        $update_data->phone = $request->phone;
        $update_data->address = $request->address;
        $update_data->gender = $request->gender;
        $update_data->image = $unique_name;
        $update_data->updated_at = Carbon::now();
        $update_data->update();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert_type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);

    }

    public function passwordView(){
        return view('admin.user.profile.change_password.change_password');
    }


    public function passwordChange(Request $request){

        $this->validate($request,[
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hash_password = Auth::user()->password;

        if (Hash::check($request->current_password,$hash_password)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
             $user->update();

             Auth::logout();
            $notification = array(
                'message' => 'Password Changed Successfully',
                'alert_type' => 'success'
            );

            return redirect()->route('login')->with($notification);
        }else{
            return redirect()->back();
        }
    }












}
