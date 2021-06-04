<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\BannedUser;
use App\Models\ReportAnswer;
use App\Models\ReportQuestion;
use App\Models\ReportUser;
use App\Models\Vote;
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

    public function reportQ($question_id){
        $qs = Question::where('question_id',$question_id)->first();
        $question = $qs->question_content;
        $email = $qs->user_email;
        $qID = $qs->question_id;

        $user = Nuser::where('user_email', $email)->first();
        $name = $user->name;

        $report = new ReportQuestion;
        $report->question_id = $question_id;
        $report->question = $question;
        $report->name = $name;
        $report->email = $email;
        $report->save();

        return redirect('/')->with('success', 'Question Reported Successfully, Thank You for your Feedback!');
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
        $ans = $answer_id;
        $delAns = Answer::where('answer_id', $ans)->delete();
        if($delAns){
            $delReportedAns = ReportAnswer::where('answer_id', $ans)->delete();
            if($delReportedAns){
                $delVotes = Vote::where('answer_id', $ans)->delete();
                if($delVotes){
                    return redirect('/adminPage')->with('success', 'Answer Deleted Successfully!');
                }
                else{
                    return redirect('/adminPage')->with('success', 'Answer Deleted Successfully!');
                }
            }
        }
    }

    public function delQs($question_id){
        $delQs = Question::where('question_id', $question_id)->delete();
        if($delQs){
            $delAns = Answer::where('question_id', $question_id)->delete();
            if($delAns){
                $delReportedQs = ReportQuestion::where('question_id', $question_id)->delete();
                if($delReportedQs){
                    return redirect('/adminPage')->with('success', 'Question and its Answers Deleted Successfully!');
                }
            }
        }
    }

    public function banUser($user_id){
        // $user = Nuser::where('id', $user_id)->first();
        // $user->password = "ReportedUser";
        $user = Nuser::where('id', $user_id)->first();
        $email = $user->user_email;
        $banned_user = new BannedUser();
        $banned_user->user_email = $email;
        $banned_user->save();
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

    public static function getAnswerCount($question_id)
	{
		$answers = Answer::where('question_id', $question_id)->count();
		return $answers;
	}
}
