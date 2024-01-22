<?php

use App\Http\Livewire\ModelPredictor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MlmodelController;
use App\Http\Controllers\ForgotPassController;
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[JobController::class,'showJobs']);

Route::get('/model',[MlmodelController::class,'showMlForm']);
Route::post('/predict',[MlmodelController::class,'predict']);
 

//Password rest 
Route::get('/showforgot',[ForgotPassController::class,'showForgotPage']);
Route::post('/passreset',[ForgotPassController::class,'passwordReset']);
Route::get('/reset-password/{token}/{email}',[ForgotPassController::class,'show_reset_password']);
Route::post('/rest-password-post',[ForgotPassController::class,'reset_password']);

// Route::get('/search',[JobController::class,'showSearch'])->middleware("guest");
Route::get('/manage',[JobController::class,'manage'])->middleware("auth");
Route::get('/job/edit/{job}',[JobController::class,'showEditPage'])->middleware("auth");
Route::get('/job/delete/{job}',[JobController::class,'delete'])->middleware("auth");


Route::get('/job/post',[JobController::class,'showPostPage'])->middleware("auth");
Route::post('/job/create',[JobController::class,'createJob'])->middleware("auth");
Route::put('/job/update/{job}',[JobController::class,'updatePost'])->middleware("auth");


//User handler
Route::get('/login', function () {return view('partials.login');})->name("login")->middleware('guest');
Route::post('/user/authenticate',[UserController::class,'authenticate']);

Route::get('/register', function () {return view('partials.registration');});
Route::post('/create_user',[UserController::class,'register']);

Route::post('/logout',[UserController::class,'logout']);

