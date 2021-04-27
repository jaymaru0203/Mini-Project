<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Nuser;
use App\Models\Question;
use App\Models\Answer;

class ProfileController extends Controller
{
    function fetchUser(Request $req)
    {
        $email = $req->session()->get("user");
        $user = Nuser::where('user_email', $email)->first();
        $questions = Question::where('user_email', $email)->get();
        $answers = Answer::where('answer_by', $email)->get();
        return view("profile", ["user" => $user, "question" => $questions, "answers" => $answers]);
    }

    function editimage(Request $req)
    {
        $email = $req->session()->get("user");
        $user = Nuser::where('user_email', $email)->first();
        $id = $user->id;


        $fileName = $id . '.' . $req->file('image')->extension();
        $req->file('image')->storeAs('public/uploads', $fileName);

        $user->image = $fileName;
        $user->save();
        $req->session()->put('user_img', $fileName);
        $req->session()->flash('smessage', 'Profile Image Updated Successfully!');

        return redirect('profile');
    }

    function editprofile(Request $req)
    {

        $req->validate([
            'name' => 'min:3|string',

            'year' => 'not_in:0',

            'branch' => 'not_in:0',

            'user_email' => 'email',

            'old_password' => 'bail|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@&]).*$/',

            'new_password' => 'bail|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@&]).*$/',

        ], [
            'old_password.regex' => 'Password must contain at least one uppercase or lowercase letter, number and special character',
            'new_password.regex' => 'Password must contain at least one uppercase or lowercase letter, number and special character',

        ]);

        $email = $req->session()->get("user");
        $user = Nuser::where('user_email', $email)->first();


        if (Hash::check($req->old_password, $user->password)) {

            $user->name = $req->name;
            $user->user_email = $req->user_email;
            $user->branch = $req->branch;
            $user->year = $req->year;
            $user->password = Hash::make($req->new_password);
            $user->save();
            $req->session()->put('user', $req->user_email);
            $req->session()->flash('smessage', 'Profile Updated Successfully!');
        } else {
            $req->session()->flash('emessage', 'Password Incorrect!');
        }
        return redirect('profile');
    }
}
