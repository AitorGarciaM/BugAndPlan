<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Issue;
use App\IssueStatus;
use App\IssuePriority;

class IssueController extends Controller
{
	public function index($name)
	{
		$project = $project = Project::where('name', '=', $name)->with('users')->first();
        $issues = Issue::where('project_id', $project->id)->get();
    	return view('project')->with('issues', $issues)->with('project', $project);
	}

    public function reportIssue(Request $request, $name)
    {
    	$project = Project::where('name', $name)->with('users')->first();

    	$request->validate([
    		'title' => 'required|min:2'
    	]);

    	$issue = new Issue([
    		'title' => $request->get('title'),
    		'description' => $request->get('description')
    	]);   	

    	$issueStatus = IssueStatus::where(['type' => 'Planned'])->firstOrFail();
    	$issue->status_id = $issueStatus->id;

    	$issuePriority = IssuePriority::where(['type' => $request->get('priority')])->firstOrFail();
		$issue->priority_id = $issuePriority->id;

		$issue->project_id = $project->id;

		$user = auth()->user();
		$issue->created_by_user_id = $user->id;
        
		$issue->save();

    	return redirect()->back()->with('success', 'the Issue has been reported correctly.');
    }

    public function editStatus(Request $request,$name, $issue_id)
    {
        $request->validate([
            'status' =>'required|min:1'
        ]);
        
        $issue = Issue::find($issue_id);
        $issueStatusID = $request->get('status');
        $issue->status_id = $issueStatusID;
        $issue->save(); 

        return redirect()->back()->with('success', 'the issue has been edited correctly.');
    }

    public function editPriority(Request $request, $name, $issue_id)
    {
        $request->validate([
            'priority' =>'required|min:1'
        ]);
        
        $issue = Issue::find($issue_id);
        $issuePriotiryID = $request->get('priority');
        $issue->priority_id = $issuePriotiryID;
        $issue->save(); 

        return redirect()->back()->with('success', 'the issue has been edited correctly.');
    }

    public function closeIssue($name,$issue_id)
    {
        $issue = Issue::find($issue_id);
        if(!$issue)
        {
           return back()->with('success', 'the issue could not be found.'.$issue_id);
        }
        $issue->closed_by_user_id = auth()->user()->id;

        $issue->save();

        return redirect()->back()->with('success', 'the issue has been closed correctly.');
    }

    public function delete($id)
    {
        Issue::find($id)->delete();
    }
}
