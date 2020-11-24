<?php

use Illuminate\Database\Seeder;
use App\IssueStatus;

class Status extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$status1 = IssueStatus::create([
			'type'				=>			'Planned'
		]);  
		$status2 = IssueStatus::create([
			'type'				=>			'In Progress'
		]);  
		$status3 = IssueStatus::create([
			'type'				=>			'Testing'
		]);  
		$status4 = IssueStatus::create([
			'type'				=>			'Completed'
		]);
	}
}
