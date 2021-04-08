<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChatController;


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
    return view('signup');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('loginuser',[Authcontroller::class,'loginuser']);

Route::post('signupuser',[Authcontroller::class,'signupuser']);


Route::get('/ask', function () {
    return view('ask');
});
Route::post('question', [QuestionController::class, "postQuestion"]);


