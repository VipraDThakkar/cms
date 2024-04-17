<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ConferencecreateController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaperController;



use App\Models\usermaster;
use App\Models\contactus;
use App\Models\conferencecreate;
use App\Models\user_conference;
use App\Models\paper_type;
use App\Models\paper;






Route::get('/', function () {
    return view('index');
});
Route::get('/login',[LoginController::class,'index']);
Route::post('/login/validate',[LoginController::class,'loginvalidate']);

Route::get('/register',[RegistrationController::class,'index'])->name('Registration.create');
Route::get('/register/delete/{id}',[RegistrationController::class,'delete'])->name('Registration.delete');
Route::post('/register/update/{id}',[RegistrationController::class,'update'])->name('Registration.update');
Route::get('/register/edit/{id}',[RegistrationController::class,'edit'])->name('Registration.edit');

Route::post('/register',[RegistrationController::class,'register']);
Route::get('get-all-session',function(){
    $session = session()->all();
    echo "<pre>";
    print_r($session);
});



Route::get('/logout',[LoginController::class,'logout']);
Route::get('/admin/dashboard',[DashboardController::class,'index']);
Route::get('/admin/user',[RegistrationController::class,'view']);
Route::get('/admin/contactus',[ContactusController::class,'index']);
Route::post('/admin/contactus/save',[ContactusController::class,'save']);



Route::get('/admin/conference',[ConferencecreateController::class,'index']);
Route::get('/admin/conference/add',[ConferencecreateController::class,'confadd']);
Route::post('/admin/conference/save',[ConferencecreateController::class,'conferencesave']);
Route::post('/admin/conference/update/{id}',[ConferencecreateController::class,'conferenceupdate']);
Route::get('/admin/conference/delete/{id}',[ConferencecreateController::class,'delete'])->name('conference.delete');
Route::get('/admin/conference/edit/{id}',[ConferencecreateController::class,'edit'])->name('conference.edit');

Route::get('/admin/paper',[AdminController::class,'index']);
Route::get('/admin/paper/sendforeditorapproval/{id}',[PaperController::class,'SendForApprovalEditor']);
Route::get('/admin/paper/sendforreviewerapproval/{id}',[PaperController::class,'SendForApprovalReviewer']);

Route::post('/admin/paper/reviewsave',[PaperController::class,'savereview']);

Route::get('/admin/paper/showPdf/{id}',[PaperController::class,'downloadPdf']);


Route::get('/author/conference/userregister/{id}',[AuthorController::class,'confregister']);
Route::get('/author/conference/usersubmitspaper/{id}',[AuthorController::class,'usersubmitspaper']);


Route::get('/author/paper',[PaperController::class,'index']);
Route::get('/author/paper/sendforapproval/{id}',[PaperController::class,'SendForApproval']);
Route::get('/author/paper/confirancedetails/{id}',[PaperController::class,'ConfDetails']);

Route::get('author/dashboard',[DashboardController::class,'authorindex']);
Route::get('author/conference',[ConferencecreateController::class,'authorindex']);


Route::get('/author/uploadpaper',function(){
    return view('author/uploadpaper');
});

Route::post('/author/uploadpaper',[PaperController::class,'upload']);

// web.php



/*
Route::get('/usermaster',function(){
    $usermaster = usermaster::all();
    echo "<pre>";
    print_r($usermaster->toArray());
});
*/

