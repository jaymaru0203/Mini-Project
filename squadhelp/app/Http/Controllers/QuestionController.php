<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    function postQuestion(Request $req)
    {
        $req->validate([
            "question" => "required|min:20|max:255",
            "year" => "required",
            "branch" => "required",
            "type" => "required"
        ]);

        $ques = $req->question;
        $year = $req->year;
        $branch = $req->branch;
        $type = $req->type;

        $q = new Question;
        $q->question_content = $ques;
        $q->branch = $branch;
        $q->year = $year;
        $q->type_of_question = $type;
        $q->user_email = $req->session()->get("user");
        $q->save();

        return redirect("/");
    }

    function fetchQuestions(Request $req){
        $q = Question::all();
        return view('feed',['question'=>$q]);
    }

    function filterQuestions(Request $req){
        $filter_data = $req->filterData;
        if($filter_data=="all"){
            $q = Question::all();
            return view('feed',['question'=>$q]);
        }else{
            $q = Question::where('type_of_question',$filter_data)->get();
            return view('feed',['question'=>$q]);
        }
        
    }
}
