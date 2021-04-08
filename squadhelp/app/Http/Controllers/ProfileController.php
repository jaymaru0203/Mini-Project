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
            'name' => 'min:3|string',

            'year' => 'not_in:0',

            'branch' => 'not_in:0',

            'user_email' => 'email',

            'old_password' => 'bail|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',

            'new_password' => 'bail|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',

        ], [
            'password.regex'  => 'The :attribute must contain at least one uppercase or lowercase letter, number and special character.',
        ]);

        $email = $req->session()->get("user");
        $user = Nuser::where('user_email', $email)->first();
        $id = $user->id;

        // $file = $req->file('image');
        // $ext = $file->getClientOriginalExtension();
        // $file->move(public_path().'/uploads/',$user->id.'.'.$ext);

        $fileName = $id . '.' . $req->file('image')->extension();        
        $req->file('image')->storeAs('public/uploads', $fileName);

        

        if (Hash::check($req->old_password, $user->password)) {

            $user->name = $req->name;
            $user->user_email = $req->user_email;
            $user->branch = $req->branch;
            $user->year = $req->year;
            $user->password = Hash::make($req->new_password);
            $user->image = $fileName;
            $user->save();
            $req->session()->put('user', $req->user_email);
            $req->session()->put('user_img', $fileName);
            $req->session()->flash('message', 'Profile Updated Successfully!');

        } else {
            $req->session()->flash('message', 'Password Incorrect!');
        }
        return redirect('profile');
    }
}
