<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use Notifiable;
	use HasRoles;

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	* The attributes that should be cast to native types.
	*
	* @var array
	*/
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function projects()
	{
		return $this->belongsToMany(
			Project::class,
			'users_has_projects',
			'user_id',
			'project_id'
		)->withPivot('role_id');
	}

	public function issues()
	{
		return $this->hasMany('App\Issue');
	}
}
