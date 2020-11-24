<?php

use Illuminate\Database\Seeder;
use App\IssuePriority;

class Priorities extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
	$priority1 = IssuePriority::create([
			'type'				=>			'Low'
		]); 
		$priority2 = IssuePriority::create([
			'type'				=>			'Minor'
		]); 
		$priority3 = IssuePriority::create([
			'type'				=>			'Major'
		]);  
		$priority4 = IssuePriority::create([
			'type'				=>			'Critical'
		]);                    
    }
}
