<?php

namespace App\Http\Controllers;

use App\Models\BannedUser;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use App\Models\Nuser;
use App\Models\ReportQuestion;
use App\Models\ReportAnswer;
use App\Models\ReportUser;
use App\Models\Log;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
	function signupuser(Request $req)
	{
		$req->validate([
			'name' => 'required|min:3|string',

			'status' => 'required',

			'year' => 'required|not_in:0',

			'branch' => 'required|not_in:0',

			'user_email' => 'required|email|ends_with:@somaiya.edu',

			'password' => 'bail|required|min:6|regex:/^(?=.*[a-z])(?=.*\d).+$/',
		], [
			'user_email.ends_with'  => 'Kindly Signup Using a Valid Somaiya Email ID',
			'password.regex' => 'Password must contain atleast 1 Alphabet and 1 Number'
		]);

		$result = Nuser::where('user_email', '=', $req->user_email)->count();


		if ($result == 0) {
			if ($req->status == "Teacher") {
				$name = "Prof. " . $req->name;
			} else {
				$name = $req->name;
			}
			$p = new Nuser;
			$p->name = $name;
			$p->status = $req->status;
			$p->year = $req->year;
			$p->branch = $req->branch;
			$p->password = Hash::make($req->password);
			$p->user_email = $req->user_email;
			$p->save();

			$otp = rand(1000, 9999);
			//  $response = new \Illuminate\Http\Response('OTP SET');

			// $response->withCookie(cookie('otp', $otp, 5));

			$req->session()->put('otp', $otp);

			$data = ['name' => $req->name, 'year' => $req->year, 'branch' => $req->branch, "otp" => $otp];

			Mail::send('mail', $data, function ($messages) use ($req) {
				$messages->to($req->user_email);
				$messages->subject('Welcome to SquadHelp');
			});
			$req->session()->put('user', $req->user_email);
			$req->session()->put('user_img', "null.png");
			return redirect('otp');
		} else {
			$req->session()->flash('register_status', 'This Email already exists.');
			return redirect('signup');
		}
	}

	public function verifyOTP(Request $req)
	{
		$email = $req->user_email;
		$formOTP = $req->otp;
		$sessionOTP = $req->session()->get('otp');
		if ($formOTP == $sessionOTP) {
			session()->forget('otp');

			$log = new Log;
			$log->email = $email;
			$log->log = now();
			$log->save();

			return redirect('/')->with('success', "User Registered Successfully");
		} else {
			session()->forget('otp');
			session()->forget('user');
			session()->forget('user_img');
			$delUser = Nuser::where('user_email', $email)->delete();
			if ($delUser) {
				$req->session()->flash('register_status', 'Incorrect OTP Entered!');
				return redirect('signup');
			}
		}
	}

	public function forgotpassword(Request $req){
		$user = Nuser::where('user_email', $req->email)->count();
		if($user<1){
			$req->session()->flash('error', 'Email Id does not exist. Please Signup!');
			return redirect('forgotpassword');
		}
		else{
			$req->session()->put('userEmail', $req->email);
			$security = rand(1000, 9999);
			$req->session()->put('security', $security);
			$data = ["security" => $security];
			Mail::send('securitycodemail', $data, function ($messages) use ($req) {
				$messages->to($req->email);
				$messages->subject('Security Code for Password Reset');
			});
			return redirect('securitycode');
		}
	}

	public function verifysecuritycode(Request $req){
		$email = $req->session()->get('userEmail');
		$securitycodeform = $req->security;
		$securitycodesession = $req->session()->get('security');
		if($securitycodeform == $securitycodesession){
			session()->forget('security');
			return redirect('resetpassword');
		}	
		else{
			session()->forget('security');
			session()->forget('userEmail');
			$req->session()->flash('register_status', 'Incorrect Security Code Entered!');
			return redirect('forgotpassword');
		}
	}

	public function verifyresetpassword(Request $req){
		$req->validate(
			[
				'password' => 'bail|required|min:6|regex:/^(?=.*[a-z])(?=.*\d).+$/',
				'confirmpassword' => 'bail|required|min:6|regex:/^(?=.*[a-z])(?=.*\d).+$/|same:password'
			]
		);

		$user = Nuser::where('user_email', $req->session()->get('userEmail'))->first();
		$user->password = Hash::make($req->password);
		$user->save();
		$req->session()->forget('userEmail');
		$req->session()->flash('error', 'Password Reset Successfully!');
		return redirect('login');
	}

	function loginuser(Request $req)
	{

		$req->validate([

			'user_email' => 'required|email',

			'password' => 'required',
		]);

		$banned = BannedUser::where('user_email', '=', $req->user_email)->count();
		if($banned > 0){
			$req->session()->flash('error', 'Account Banned Permanently!');
			return redirect('login');
		}
		$result = Nuser::where('user_email', '=', $req->user_email)->get();
		$res = json_decode($result, true);

		if ($req->user_email == "admin@squadhelp.com" && $req->password == "admin123") {
			$req->session()->put('admin', $req->user_email);
			return redirect('admin');
		}

		if (sizeof($res) == 0) {
			// if(true){
			$req->session()->flash('error', 'Email Id does not exist. Please Signup!');
			echo "Email Id Does not Exist.";
			return redirect('login');
		} else {
			// if($result[0]->password==Hash::make($req->password))
			if (Hash::check($req->password, $result[0]->password)) {
				echo "You are logged in Successfully";
				$req->session()->put('user', $result[0]->user_email);
				$req->session()->put('user_img', $result[0]->image);
				$email = $result[0]->user_email;

				$count = 0;

				$check = Log::where('email', $email)->first()->log;
				$count = ChatMessage::where('receiver', $email)->where('created_at', '>', $check)->count();

				if($count > 0){
					$req->session()->put('msg', $count);
				}

				$log = Log::where('email', $email)->first();
				$log->log = now();
				$log->save();				

				return redirect('/');
			} else {
				$req->session()->flash('error', 'Password Incorrect!!!');
				echo "Email Id Does not Exist.";
				return redirect('login');
			}
		}
	}

	function logout(Request $req)
	{
		if (session()->has('user')) {

			$email = $req->session()->get('user');
			$log = Log::where('email', $email)->first();
			$log->log = now();
			$log->save();

			$req->session()->flush();
			return redirect('login');
		}
		if (session()->has('admin')) {
			$req->session()->flush();
			return redirect('login');
		} else {
			return redirect('signup');
		}
	}

	public function admin()
	{
		$user = Nuser::all();
		$reportedQ = ReportQuestion::distinct()->get(['question_id', 'question', 'name', 'email']);
		$reportedA = ReportAnswer::distinct('answer_id')->get(['answer_id', 'answer', 'name', 'email']);
		$reportedU = ReportUser::all();

		return view('admin', ['users' => $user, 'reportedQ'=>$reportedQ, 'reportedA' => $reportedA, 'reportedU' => $reportedU]);
	}

	public static function getUser($email)
	{
		$user = Nuser::where('user_email', $email)->first();
		return $user;
	}

	public function about(Request $req){
		return view('about');
	}
}
