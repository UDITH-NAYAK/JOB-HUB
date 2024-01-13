<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            // return redirect('/')->with('message','Login Successfull');
        }

        return back()->withErrors(['email'=>'Invalid emial ot password']);

    }

    public function logout(){
        auth()->logout();
        request()->session()->regenerate();
        request()->session()->regenerateToken();
        return redirect('/login');
        

    }
}
