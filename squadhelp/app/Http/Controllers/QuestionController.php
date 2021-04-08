<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Nuser;

class QuestionController extends Controller
{
    function postQuestion(Request $req)
    {
        $req->validate([
            "question" => "required|min:20|max:255",
            "year" => "required|not_in:0",
            "branch" => "required|not_in:0",
            "type" => "required|not_in:0"
        ]);

        $ques = $req->question;
        $year = $req->year;
        $branch = $req->branch;
        $type = $req->type;

        $email = $req->session()->get('user');
        $q = new Question;
        $q->question_content = $ques;
        $q->branch = $branch;
        $q->year = $year;
        $q->type_of_question = $type;
        $q->user_email = $email;
        $q->save();

        return redirect("/");
    }

    function fetchQuestions(Request $req){
        $user_email = $req->session()->get("user");
        
        $user_details = Nuser::where("user_email",$user_email)->first();
        // $user_details_year = $user_details->year;
        // $user_details_branch = $user_details->branch;

        // $user_details_img = $user_details->image;
        
        $q = Question::all();
        
        return view('feed',['question'=>$q,"user_details"=>$user_details]);
    }

    function filterQuestions(Request $req){
        $filter_data = $req->filterData;

        $user_email = $req->session()->get("user");
        $user_details = Nuser::where("user_email",$user_email)->first();
        
        if($filter_data=="all"){
            $q = Question::all();
            return view('feed',['question'=>$q, "user_details"=>$user_details]);
        }else{
            $q = Question::where('type_of_question',$filter_data)->get();
            return view('feed',['question'=>$q, "user_details"=>$user_details]);
        }
        
    }
}
