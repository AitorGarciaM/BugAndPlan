<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	* Seed the application's database.
	*
	* @return void
	*/
	public function run()
	{
		$this->call('RolesTableSeeder');
		$this->call('UsersTablesSeeders');
		$this->call('Status');       
		$this->call('Priorities');
	}
}
