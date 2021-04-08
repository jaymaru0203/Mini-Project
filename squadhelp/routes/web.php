<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;



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

Route::get("/",[QuestionController::class,'fetchQuestions']);

Route::get("/filter",[QuestionController::class,'filterQuestions']);

Route::get("/postanswer",[AnswerController::class,'repliesForQuestions']);

Route::get("/allanswers/{question_id}",[AnswerController::class,'getAllReplies']);


Route::get("/messages/{id}", [ChatController::class, "chat"]);

Route::get("/chatRoom/{id}", [ChatController::class, "createRoom"]);

Route::get("/chat", [ChatController::class, "rooms"]);

Route::post("/chatForm", [ChatController::class, "message"]);

Route::post("/searchForm", [ChatController::class, "search"]);


Route::get("upvote/{answer_id}",[AnswerController::class,'upVote']);

Route::get("downvote/{answer_id}",[AnswerController::class,'downVote']);


Route::get('/signup', function () {
	if(session()->has('user')){
		return redirect('/');

	}else{
    return view('signup');}
});

Route::get('/login', function () {
	if(session()->has('user')){
		return redirect('/');

	}else{
    return view('login');}
});

Route::get("/logout",[AuthController::class,'logout']);

Route::post('loginuser',[Authcontroller::class,'loginuser']);

Route::post('signupuser',[Authcontroller::class,'signupuser']);

Route::get('/ask', function () {
    return view('ask');
});

Route::get('/profile', [ProfileController::class, "fetchUser"]);
Route::post('editprofile', [ProfileController::class, "editprofile"]);

Route::post('question', [QuestionController::class, "postQuestion"]);


