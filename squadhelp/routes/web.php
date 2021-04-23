<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Models\Nuser;



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


Route::get("/",[QuestionController::class,'fetchQuestions'])->middleware(['usersession','otpsession']);

Route::get("/filter",[QuestionController::class,'filterQuestions'])->middleware(['usersession','otpsession']);

Route::get("/filterTeacher",[QuestionController::class,'filterQuestionsTeacher'])->middleware(['usersession','otpsession']);

Route::get("/postanswer",[AnswerController::class,'repliesForQuestions'])->middleware(['usersession','otpsession']);

Route::get("/allanswers/{question_id}",[AnswerController::class,'getAllReplies'])->middleware(['usersession','otpsession']);


Route::get("/messages/{id}", [ChatController::class, "chat"])->middleware(['usersession','otpsession']);

Route::get("/chatRoom/{id}", [ChatController::class, "createRoom"])->middleware(['usersession','otpsession']);

Route::get("/chat", [ChatController::class, "rooms"])->middleware(['usersession','otpsession']);

Route::post("/chatForm", [ChatController::class, "message"]);

Route::post("/searchForm", [ChatController::class, "search"]);


Route::get("upvote/{answer_id}",[AnswerController::class,'upVote'])->middleware(['usersession','otpsession']);

Route::get("downvote/{answer_id}",[AnswerController::class,'downVote'])->middleware(['usersession','otpsession']);

Route::get("reportA/{answer_id}",[ReportController::class,'reportA'])->middleware(['usersession','otpsession']);

Route::get("reportU/{id}",[ReportController::class,'reportU'])->middleware(['usersession','otpsession']);

Route::post("delAns/{answer_id}",[ReportController::class,'delAns']);

Route::post("banUser/{user_id}",[ReportController::class,'banUser']);

Route::get("warnUser/{user_id}",[ReportController::class,'warnUser']);

Route::get('/signup', function () {
	if(session()->has('user')){
		return redirect('/');

	}else{
    return view('signup');}
});

Route::get('/otp', function () {
	if(session()->has('otp')){
		return view('otp');
	}elseif (session()->has('user')){
		return redirect('/');
	}else{
		return redirect('signup');
	}
});

Route::get('/login', function () {
	if(session()->has('user')){
		return redirect('/');

	}else{
    return view('login');}
});

Route::get('/admin', function () {
	if(session()->has('admin')){
		return redirect('/adminPage');
	}else{
    return view('login');}
});

Route::get("/adminPage",[AuthController::class,'admin']);

Route::get("/logout",[AuthController::class,'logout'])->middleware(['usersession','otpsession']);

Route::post('loginuser',[Authcontroller::class,'loginuser']);

Route::post('signupuser',[Authcontroller::class,'signupuser']);

Route::post('submitOTP',[Authcontroller::class,'verifyOTP']);

Route::get('/ask', function () {
    return view('ask');
})->middleware(['usersession','otpsession']);

Route::get('/profile', [ProfileController::class, "fetchUser"])->middleware(['usersession','otpsession']);

Route::post('editprofile', [ProfileController::class, "editprofile"]);

Route::post('editimage', [ProfileController::class, "editimage"]);

Route::post('question', [QuestionController::class, "postQuestion"]);




