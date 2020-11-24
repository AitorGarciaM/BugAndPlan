<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WorkspaceController extends Controller
{
	public function index()
	{
		$projects = DB::table('projects')->orderBy('created_at', 'desc')->get();
		return view('workspace', compact('projects'));
	}

	public function showProjectsInWorkspace()
	{
		$user = auth()->user();

		if($user != null)
		{
			$projects = $user->projects()->orderBy('created_at', 'desc')->get();
		}
		return view('workspace', compact('projects'));
	}
	
	public function settings()
	{
		return view('settings');
	}
}
