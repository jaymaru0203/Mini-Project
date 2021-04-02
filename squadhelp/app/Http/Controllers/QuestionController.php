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
        $q->user_email = "eshavats@gmail.com";
        $q->save();

        return redirect("/");
    }
}
