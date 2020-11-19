<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssuePriority extends Model
{
    protected $fillable = [
    	'type'
    ];

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
}
