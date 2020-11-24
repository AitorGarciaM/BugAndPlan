<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueStatus extends Model
{
	protected $fillable = [
		'type'
	];

	public function issues()
	{
		return $this->hasMany('App\Issue');
	}
}
