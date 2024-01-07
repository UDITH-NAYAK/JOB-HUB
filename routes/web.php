<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
 

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


Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('partials.login');
});
Route::get('/register', function () {
    return view('partials.registration');
});

 Route::get('/job/post',[JobController::class,'showPostPage']);
 Route::post('/job/create',[JobController::class,'createJob']);
