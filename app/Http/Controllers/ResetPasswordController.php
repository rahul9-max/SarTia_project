<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Info;
use App\Mail\ForgetPasswordMail;

class ResetPasswordController extends Controller
{
    //
    public function forgetPassword(){
        return view('forgetPassword');
    }
    public function forgetPasswordToken(Request $request){
        $user=Info::where('email',$request->email)->first();
        if(!empty($user)){
            $user->remember_token=Str::random(40);
            $user->save();
            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with('status', 'Password reset link sent successfully');
        }else{
            return redirect()->back()->with('error','user not found');
        }
    }
    public function reset($token){
        $user=Info::where('remember_token',$token)->first();
        if(!empty($user)){
            $data['user']=$user;
            return view('reset',$data);
        }else{
            abort(404);
        }     
    }
    public function reset_password(Request $request,$token){
        $user=Info::where('remember_token',$token)->first();
        if(!empty($user)){
           if($request->password==$request->password_confirm){
            $user->password=Hash::make($request->password);
            if(empty($user->email_verified_at)){
                $user->email_verified_at=date('Y-m-d H:i:s');
            }
            $user->remember_token=Str::random(40);
            $user->save();
            return redirect()->back()->with('status', 'Password changed successfully');
           }else{

            return redirect()->back()->with('error', 'Password and confirm password does not match');
           }
        }else{
            abort(404);
        }     
    }
}
