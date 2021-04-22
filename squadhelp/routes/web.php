<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;



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

// Route::get('/', function () {
//     return view('feed');
// });

Route::get("/",[QuestionController::class,'fetchQuestions'])->middleware('usersession');

Route::get("/filter",[QuestionController::class,'filterQuestions'])->middleware('usersession');
Route::get("/filterTeacher",[QuestionController::class,'filterQuestionsTeacher'])->middleware('usersession');

Route::get("/postanswer",[AnswerController::class,'repliesForQuestions'])->middleware('usersession');

Route::get("/allanswers/{question_id}",[AnswerController::class,'getAllReplies'])->middleware('usersession');


Route::get("/messages/{id}", [ChatController::class, "chat"])->middleware('usersession');

Route::get("/chatRoom/{id}", [ChatController::class, "createRoom"])->middleware('usersession');

Route::get("/chat", [ChatController::class, "rooms"])->middleware('usersession');

Route::post("/chatForm", [ChatController::class, "message"]);

Route::post("/searchForm", [ChatController::class, "search"]);


Route::get("upvote/{answer_id}",[AnswerController::class,'upVote'])->middleware('usersession');

Route::get("downvote/{answer_id}",[AnswerController::class,'downVote'])->middleware('usersession');

Route::get("reportA/{answer_id}",[ReportController::class,'reportA'])->middleware('usersession');

Route::get("reportU/{id}",[ReportController::class,'reportU'])->middleware('usersession');

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
    return view('otp');
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

Route::get("/logout",[AuthController::class,'logout'])->middleware('usersession');

Route::post('loginuser',[Authcontroller::class,'loginuser']);
Route::post('signupuser',[Authcontroller::class,'signupuser']);
Route::post('submitOTP',[Authcontroller::class,'verifyOTP']);

Route::get('/ask', function () {
    return view('ask');
})->middleware('usersession');

Route::get('/profile', [ProfileController::class, "fetchUser"])->middleware('usersession');
Route::post('editprofile', [ProfileController::class, "editprofile"]);
Route::post('editimage', [ProfileController::class, "editimage"]);

Route::post('question', [QuestionController::class, "postQuestion"]);




