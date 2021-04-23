<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\ReportAnswer;
use App\Models\ReportUser;
use App\Models\Nuser;
use Illuminate\Support\Facades\DB;
use Mail;

class ReportController extends Controller
{
    public function reportA($answer_id){
        $ans = Answer::where('answer_id',$answer_id)->first();
        $answer = $ans->answer;
        $email = $ans->answer_by;
        $qID = $ans->question_id;

        $user = Nuser::where('user_email', $email)->first();
        $name = $user->name;

        $report = new ReportAnswer;
        $report->answer_id = $answer_id;
        $report->answer = $answer;
        $report->name = $name;
        $report->email = $email;
        $report->save();

        return redirect('/allanswers/'.$qID)->with('success', 'Answer Reported Successfully, Thank You for your Feedback!');
    }

    public function reportU($id){
        $user = Nuser::where('id', $id)->first();
        $name = $user->name;
        $email = $user->user_email;

        $u = new ReportUser;
        $u->user_id = $id;
        $u->name = $name;
        $u->email = $email;
        $u->save();

        return redirect('/chat/')->with('success', 'User Reported Successfully, Thank You for your Feedback!');
    }

    public function delAns($answer_id){
        $delAns = Answer::where('answer_id', $answer_id)->delete();
        if($delAns){
            return redirect('/adminPage')->with('success', 'Answer Deleted Successfully!');
        }
    }

    public function banUser($user_id){
        $user = Nuser::where('id', $user_id)->first();
        $user->password = "ReportedUser";
        $user->save();
        return redirect('/adminPage')->with('success', 'User Banned Successfully!');
    }

    public function warnUser($user_id){
        $user = Nuser::where('id', $user_id)->first();
        $email = $user->user_email;

        $data = ['name'=>$user->name]; 

           Mail::send('warningMail',$data,function($messages) use ($user){
                 $messages->to($user->user_email);
                 $messages->subject('Warning from SquadHelp');
           });

        return redirect('/adminPage')->with('success', 'Warning Email Sent to User Successfully!');
    }
}
