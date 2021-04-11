<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nuser;
use App\Models\ReportAnswer;
use App\Models\ReportUser;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    function signupuser(Request $req)
	{

		$req->validate([
			'name'=>'required|min:3|string',
			
			'status'=>'required',
			
			'year'=>'required|not_in:0',

			'branch'=>'required|not_in:0',

			'user_email'=>'required|email',

			'password'=>'bail|required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
		]);

		$result = Nuser::where('user_email','=',$req->user_email)->count();
          

        if($result==0){
		  $p = new Nuser;
          $p->name = $req->name;
          $p->status =$req->status;
          $p->year= $req->year;
          $p->branch = $req->branch;
          $p->password = Hash::make($req->password);
          $p->user_email = $req->user_email;
          $p->save();
          $req->session()->flash('register_status','User has been registered successfully');
          $req->session()->put('user',$req->user_email);
          $req->session()->put('user_img',"null.jpg");
          return redirect('/');
           }
           else{
           	$req->session()->flash('register_status','This Email already exists.');
              return redirect('signup');
           }


	}


	function loginuser(Request $req){

		$req->validate([

			'user_email'=>'required|email',

			'password'=>'required',
		]);


		$result = Nuser::where('user_email','=',$req->user_email)->get();
        $res = json_decode($result,true);

		if($req->user_email == "admin@squadhelp.com" && $req->password == "admin123"){
			$req->session()->put('admin',$req->user_email);
			return redirect('admin');
		}
       
         if(sizeof($res)==0){
        // if(true){
         	$req->session()->flash('error','Email Id does not exist. Please Signup!');
				echo "Email Id Does not Exist.";
				return redirect('login');
	     }
	     else{
	     	// if($result[0]->password==Hash::make($req->password))
	     		if(Hash::check($req->password, $result[0]->password)){
	     		echo "You are logged in Successfully";
				$req->session()->put('user',$result[0]->user_email);
				$req->session()->put('user_img',$result[0]->image);
				return redirect('/');
	     	}
	     	else{
			$req->session()->flash('error','Password Incorrect!!!');
			echo "Email Id Does not Exist.";
			return redirect('login');
	        }
	       }
	      }

	      function logout(Request $req){
             if(session()->has('user')){
             	$req->session()->flush();
             	return redirect('login');
             }
             if(session()->has('admin')){
             	$req->session()->flush();
             	return redirect('login');
             }
             else{
             	return redirect('signup');
             }

	      }
		  
		  public function admin(){
			$user = Nuser::all();
			$reportedA = ReportAnswer::all();
			$reportedU = ReportUser::all();

			return view('admin', ['users'=>$user, 'reportedA'=>$reportedA, 'reportedU'=>$reportedU]);
		  }

		  

}
