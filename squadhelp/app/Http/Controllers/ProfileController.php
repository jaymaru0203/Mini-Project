<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Nuser;

class ProfileController extends Controller
{
    function fetchUser(Request $req)
    {
        $email = $req->session()->get("user");
        $user = Nuser::where('user_email', $email)->first();
        return view("profile", ["user" => $user]);
    }

    function editprofile(Request $req)
    {

        $req->validate([
            'name' => 'required|min:3|string',

            'year' => 'required|not_in:0',

            'branch' => 'required|not_in:0',

            'user_email' => 'required|email',

            'old_password' => 'bail|required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',

            'new_password' => 'bail|required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',

        ], [
            'password.regex'  => 'The :attribute must contain at least one uppercase or lowercase letter, number and special character.',
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
            $req->session()->flash('message', 'Profile Updated Successfully!');

        } else {
            $req->session()->flash('message', 'Password Incorrect!');
        }
        return redirect('profile');
    }
}
