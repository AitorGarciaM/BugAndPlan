<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Issue;

class ProjectsController extends Controller
{
	public function index()
	{
		$user = auth()->user();
		$projects = $user->projects()->orderBy('created_at', 'desc')->get();

		return view('projects')->with('projects', $projects);
	}

	public function createProject(Request $request)
	{
		$request->validate([
			'name' => 'required|min:2'
		]);

		$project = new Project([
			'name'=> $request->get('name'),
			'description' => $request->get('description')
		]);

		$user = auth()->user();
		$project->save();
		$project->users()->attach($user->id, ['role_id' => 1]);

		return redirect('/projects')->with('success', 'the project has been created correctly.');
	}

	public function showProject($name)
	{

		$user = auth()->user();
		$project = $user->projects()->where('name', $name)->get();
		foreach($user->projects() as $project)
		{
			if($project->name == $name)
			{
				$role = $project->pivot->role_id;
			}
		}
				
		return view('project')->with('project', $project)->with('role', $role);
		
	}

	public function showUsers($name)
	{
		$project = Project::where('name', '=', $name)->with('users')->first();

		return view('users')->with('project', $project);
	}

	public function showPosts($name)
	{

		$project = Project::where('name', '=', $name)->with('users')->first();

		return view('forum')->with('project', $project);
	}

	public function addUser(Request $request,$name)
	{
		$project = Project::where('name', '=', $name)->first();
		$user = User::where('email', $request->get('email'))->get();
		$project->users()->attach($user, ['role_id' => $request->get('role')]);
		return redirect()->back()->with('success', 'User has been added to '.$name.' correctly.');
	}

	public function updateProject($id, Request $request)
	{
		$project = DB::table('projects')->where('id', $id)->update(['description' => $request->get('description')]);
	}

	public function deleteProject($id)
	{
		$project = Project::where('id', $id);
		Issue::where('project_id', $id)->delete();
		$project->delete();

		return redirect()->back()->with('success', 'Project has been deleted.');
	}

	public function removeUser($name,$id)
	{
		$project = Project::where('name', '=', $name)->with('users')->first();
		$project->users()->detach($id);
		return redirect()->back()->with('success', 'User has been removed from '.$name.' correctly.');
	}
}
