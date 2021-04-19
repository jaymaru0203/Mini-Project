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
            "question" => "required|min:5|max:255",
            "qsFor" => "required",
            "year" => "not_in:0",
            "branch" => "required|not_in:0",
            "type" => "required|not_in:0"
        ]);

        $ques = $req->question;
        $year = $req->year;
        $branch = $req->branch;
        $type = $req->type;
        $qsFor = $req->qsFor;

        $email = $req->session()->get('user');

        $q = new Question;
        $q->question_content = $ques;
        $q->qsFor = $qsFor;
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
        if($user_details->status == "Teacher"){
          $q = Question::where("qsFor", "Teacher")->latest()->get();
        }
        else{
          $q = Question::latest()->get();
        }
        
        return view('feed',['question'=>$q,"user_details"=>$user_details]);
    }

    function filterQuestions(Request $req){
        $filtercategory = $req->filtercategory;
        $filterbranch = $req->filterbranch;
        $filteryear = $req->filteryear;

        $user_email = $req->session()->get("user");
        $user_details = Nuser::where("user_email",$user_email)->first();
        
        if($filtercategory=="0"){
           if($filterbranch=="0"){
              if($filteryear=="0"){
                $q = Question::all();
              }
              else{
                $q = Question::where('year',$filteryear)->get();
              }
           }
           else{
              if($filteryear=="0"){
                $q = Question::where('branch',$filterbranch)->get();
              }
              else{
                $q = Question::where('year',$filteryear)->where('branch',$filterbranch)->get();
              }
           }
        }
        else{
            if($filterbranch=="0"){
              if($filteryear=="0"){
                $q = Question::where('type_of_question',$filtercategory)->get();
              }
              else{
                $q = Question::where('year',$filteryear)->where('type_of_question',$filtercategory)->get();
              }
           }
           else{
              if($filteryear=="0"){
                $q = Question::where('branch',$filterbranch)->where('type_of_question',$filtercategory)->get();
              }
              else{
                $q = Question::where('year',$filteryear)->where('branch',$filterbranch)->where('type_of_question',$filtercategory)->get();
              }
           }

        }
          
        return view('feed',['question'=>$q, "user_details"=>$user_details]);
        
    }

    public function filterQuestionsTeacher(Request $req){
        $filtercategory = $req->filtercategory;
        $filterbranch = $req->filterbranch;

        $user_email = $req->session()->get("user");
        $user_details = Nuser::where("user_email",$user_email)->first();
        
        if($filtercategory=="0"){
           if($filterbranch=="0"){
                $q = Question::where('qsFor', 'Teacher')->get();
              }
              else{
                $q = Question::where('branch',$filterbranch)->where('qsFor', 'Teacher')->get();
              }
           }
           else{
              if($filterbranch=="0"){
                $q = Question::where('type_of_question',$filtercategory)->where('qsFor', 'Teacher')->get();
              }
              else{
                $q = Question::where('type_of_question',$filtercategory)->where('branch',$filterbranch)->where('qsFor', 'Teacher')->get();
              }
           }

        return view('feed',['question'=>$q, "user_details"=>$user_details]);
    }
}
