<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTablesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user1 = User::create([
			'name'				=>			'Aitor',
			'email'				=>			'aitor@test.com',
			'password'			=>			Hash::make('password'),
		]);      

        $user2 = User::create([
            'name'          =>          'Jhon',
            'email'         =>          'Jhon@test.com',
            'password'      =>          Hash::make('1234'),
        ]);

        $user1->assignRole('admin');
        $user2->assignRole('developer');
    }
}
