<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    function repliesForQuestions(Request $req){
        $question_id = $req->question_id;
        $answer = $req->answer;

        $a = new Answer;
        $a->question_id = $question_id;
        $a->answer = $answer;
        $a->answer_by = "eshavats@gmail.com";
        $a->save();

        return redirect("/");
    }

    function getAllReplies($question_id){
        // getting all the replies associated with the respective queestion id
        $a = Answer::where("question_id",$question_id)->get();

        // getting the repective question 
        $q = Question::where("question_id",$question_id)->first();
        
        return view("replies",["question"=>$q,"answers"=>$a]);
        
    }
}
