<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function adminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile', compact('adminData'));
    }
    public function adminProfileEdit(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('adminData'));
    }
    public function adminProfileUpdate(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.profile')->with($notification);
     }
     public function adminChangePassword(){
         return view('admin.admin_change_password');
     }
     public function adminPasswordUpdate(Request $request){
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $data = Admin::find(1);
            $data->password = Hash::make($request->password);
            $data->save();
            Auth::logout();
            return Redirect()->route('admin.logout');
        }     
        else{
            return Redirect()->back();
        }        
     }
}
