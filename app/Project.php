<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
	 * The atributes that are assigneble
	 */
    protected $fillable = [
    	'name', 'description'
    ];

     public function users()
    {
        return $this->belongsToMany(
            User::class,
            'users_has_projects',
            'project_id',
            'user_id'            
        );
    }

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
}
