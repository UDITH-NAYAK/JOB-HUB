<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPassController extends Controller
{
    public function showForgotPage(){
        return view('partials.forgot');
 
    }
    
    public function passwordReset(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $res=User::where('email',$email);
        if(!$res){
                return back()->withErrors(['email'=>'Email does not exist']);
        }

        // $token = rand(1000, 9999);
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),

        ]);

        

        Mail::send("Email.mailTemplate",['token'=>$token,'email'=>$request->email],function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
            return back()->with('message','Message send Successfully');

        });

        return back()->with('message','Password reset email sent successfully');
        // Storeing  the OTP in the session or database for validation
        // session(['otp' => $otp]);

        // // Send email with OTP
        // Mail::to($email)->send(new Sendmail(['otp' => $otp]));

        // return redirect()->route('password.reset')->with('status', 'Password reset email sent successfully.');
    }


    public function show_reset_password($token,$email){
        return view('partials.new-password',compact('token','email'));
    }

    public function  reset_password(Request $request) {
        $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required|string|min:4|confirmed',
            'password_confirmation'=>'required',
            
        ]);

        $updatedPassword=DB::table('password_resets')
        ->where([
            'email'=>$request->email,
            'token'=>$request->token
        ])->first();

        if(!$updatedPassword) 
            return back()->withErrors(['emial'=>' email id doesnot exist..']) ;

        User::where('email',$request->email)
        ->update(['password'=>Hash::make($request->password)]);

        DB::table('password_resets')->where('email',$request->email)->delete();
        
        return redirect()->to('login');
        
    }


}
