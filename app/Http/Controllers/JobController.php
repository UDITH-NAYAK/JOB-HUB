<?php

namespace App\Http\Controllers;

use App\Mail\Sendmail;
use App\Models\JobPost;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
 

class JobController extends Controller
{
   
 
    public function showPostPage()
    {
        return view('partials.UploadPost');
    }


    public function createJob(Request $request)
    {
        $formfields = request()->validate([
            'company' => ['required', Rule::unique('job_posts', 'company')],
            'title' => 'required|min:3',
            'experience' => 'required|min:0',
            'salary' => 'required|numeric|min:0 ',
            'skills' => 'required ',
            'location' => 'required ',
            'job_link' => 'required',
            'description' => 'required ',
            'user_id' => '',
            'logo' => ''

        ]);

        $formfields['user_id'] = auth()->id();

        if (request()->hasFile('logo')) {
            // $formfields['logo'] = $request->file('logo')->store('logos', 'public');
            //important: run this  php artisan storage:link to store files    
            $formfields['logo'] = request()->file('logo')->store('/logos','public');       
        }

 
        JobPost::create($formfields);
        return redirect('/')->with('message', 'Post created..');
    }

    public function showJobs()
    {
        if(request('search')||request('filters'))
            return view("index", ["jobs" => JobPost::filter(request('search'),request('filters'))->paginate(5)]);
    
        return view("index", ["jobs" => JobPost::latest()->paginate(5)]);
        // return view("index");
    }


    public function manage()
    {
        return view('partials.manage', ["jobs" => auth()->user()->listings()->get()]);
    }

    public function showEditPage(JobPost $job)
    {
        return view('partials.edit', ["job" => $job]);
    }
    public function updatePost(JobPost $job)
    {
        $formfields = request()->validate([
            'company' => 'required',
            'title' => 'required|min:3',
            'experience' => 'required:',
            'salary' => 'required|numeric ',
            'skills' => 'required ',
            'location' => 'required ',
            'description' => 'required|min:25 ',

        ]);

        if (request()->hasFile('logo')) {
            $formfields['logo'] = request()->file('logo')->store('/logos','public');
            Storage::put('test.txt',"hello");
        }
        
        // if (request()->hasFile('logo')) {
        //     $formfields['logo'] = request()->file('logo')->store('logos', 'public');
        //     //important: run this  php artisan storage:link to store files           
        // }

        $job->update($formfields);
        return redirect('/manage')->with('message', 'Updated successfully');
    }


    public function delete(JobPost $job)
    {
        $job->delete();
        return back()->with('message', 'Post Deleted Successfully');
    }

    public function showPopup(){

        // dd(request('confirm-message'));
        $job_id=request('job_id');
     
        return back()->with(['job_id'=>$job_id,'confirm-message'=>true]);
        // session();
    }

   
}
