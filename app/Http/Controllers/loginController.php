<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

	function logout()
	{
		Auth::logout();
		return redirect('login');
	}
}
