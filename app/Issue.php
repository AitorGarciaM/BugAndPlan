<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IssueStatus;
use App\IssuePriority;
use App\Project;

class Issue extends Model
{
	protected $fillable = [
		'title', 'description', 'project_id', 'closed_by', 'status_id', 'priority_id'
	];

	public function project()
	{
		return $this->belongsTo('App\Project');
	}

	public function status()
	{
		return $this->belongsTo('App\IssueStatus');
	}

	public function priority()
	{
		return $this->belongsTo('App\IssuePriority');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
