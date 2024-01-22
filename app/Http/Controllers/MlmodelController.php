<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Component;

class MlmodelController extends Controller
{
    public function showMlForm(){
        return view('ML.mlform');
    }
    public function predict(){
        $exp=request()->experience;
        $test_score=request()->test_score;
        $interview_score=request()->interview_score;
        
        $all=json_encode(request()->all());
        $command=escapeshellcmd("python pythonapp.py $exp $test_score $interview_score $all");
        $output=shell_exec($command);
        
        $output=explode('.',$output);
        
        return view('ML.mlform', [
            'output' => $output[0],
            'exp'=>$exp,
            'test_score'=>$test_score,
            'interview_score'=>$interview_score,
        ]);
            
    }
}
