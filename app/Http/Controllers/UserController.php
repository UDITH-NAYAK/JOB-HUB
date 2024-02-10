<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Sendmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register(){
        $formfileds=request()->validate([
            'name'=>'required',
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','confirmed','min:6']
        ]);
        
        $formfileds['password']=bcrypt($formfileds['password']);
        $user=User::create($formfileds);

        //setting user credentials 
        auth()->login($user);

        return redirect('/')->with('message','Registered successfully');
    }


    public function authenticate(){
        $formfields = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'

        ]);

        if(auth()->attempt($formfields))
        {
            request()->session()->regenerate();
            return redirect('/')->with('message','Login Successfull');
        }

        return back()->withErrors(['email'=>'Invalid email or password']);

    }

    
    public function logout(){
        auth()->logout();
        request()->session()->regenerate();
        request()->session()->regenerateToken();
        return redirect('/login');
        

    }
}
