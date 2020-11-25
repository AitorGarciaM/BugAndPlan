<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class loginController extends Controller
{
	function index()
	{
		return view('login');
	} 

	function checkLogin(Request $request)
	{
		$this->validate($request, [
			'email'		=>		'required|email',
			'password'	=>		'required|alphaNum|min:3'
		]);

		$user_data = array(
			'email'		=>		$request->get('email'),
			'password'	=>		$request->get('password')
		);

		if(Auth::attempt($user_data))
		{
			return redirect('/');
		}
		else
		{
			return back()->with('error', 'Wrong email or password');
		}
	}   

	function successlogin()
	{
		return view('successlogin');
	}

	function registerUser(Request $request)
	{
		$this->validate($request, [
		
			'userName' => 'required|min:2',
			'email' => 'required|email',
			'confirmEmail'	=> 'required|min:2',
			'password' 	=> 'required|min:2',
			'confirmPassword' => 'required|min:2',
		]);

		if($request->get('email') != $request->get('confirmEmail'))
		{
			return redirect()->back()->with("error", "email don't match");
		}

		if($request->get('password') != $request->get('confirmPassword'))
		{
			return redirect()->back()->with("error", "password don't match");
		}

		// store user in database.
		$user = new User([
			'name' => $request->get('userName'),
			'email' => $request->get('email'),
			'password' => \Hash::make($request->get('password'))
		]);

		$user->save();

		return redirect('login')->with('success', 'User has been registered');
	}

	function logout()
	{
		Auth::logout();
		return redirect('login');
	}
}
