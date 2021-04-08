<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    function repliesForQuestions(Request $req){
        $question_id = $req->question_id;
        $answer = $req->answer;
        $email = $req->session()->get('user');
        $a = new Answer;
        $a->question_id = $question_id;
        $a->answer = $answer;
        $a->answer_by = $email;
        $a->upvote_count = 0;
        $a->downvote_count = 0;
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

    function upVote($answer_id){
        // $a = Answer::where("answer_id",$answer_id)->first();
        // $upvote =  $a->upvote_count;
        // $upvote += 1;
        // $a->upvote_count = $upvote;
        // echo $a;
        // $a->save();

        // $a = Answer::where("answer_id",$answer_id)->first();
        // echo $a;
        // $question_id = $a->question_id;
        // echo "<br>";
        // $answer = Answer::where("answer_id",$answer_id)->first();
        // echo $answer;
        // $answer->upvote_count = $answer->upvote_count+1;
        // $answer->save();


        // /allanswers/{question_id};

        $a = DB::table('answers')->where('answer_id',$answer_id)->first();
        $upvote = $a->upvote_count+1;
        $question_id = $a->question_id;
        $b = DB::table('answers')->where('answer_id',$answer_id)->update(['upvote_count'=>$upvote]);

        return redirect("allanswers/".$question_id);
    }
    
    function downVote($answer_id){
        $a = DB::table('answers')->where('answer_id',$answer_id)->first();
        $downvote = $a->downvote_count+1;
        $question_id = $a->question_id;
        $b = DB::table('answers')->where('answer_id',$answer_id)->update(['downvote_count'=>$downvote]);

        return redirect("allanswers/".$question_id);
    }
}
