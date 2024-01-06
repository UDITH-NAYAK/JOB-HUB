<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
 
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function showPostPage(){
        return view('partials.showPost');
    }


    public function createJob(){
         $formfields=request()->validate([
            'company'=>['required',Rule::unique('job_posts','company')],
            'title'=>'required|min:3',
            'experience'=>'required',
            'salary'=>'required|numeric ',
            'skills'=>'required ',
            'location'=>'required ',
            'description'=>'required ',

         ]);

         JobPost::create($formfields);
         echo("Record inserted..");
    }
}
 