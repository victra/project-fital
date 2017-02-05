<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->delete();
        
		\DB::table('users')->insert(array ( 
			array (
				'id' => 1,
				'nip' => '00001',
				'name' => 'Dark King',
				'email' => 'dk',
				'password' => Hash::make('password'),
				'role' => 'administrator',
				'jkl' => 'Laki-laki',
				'agama' => 'Islam',
				'tlp' => '0987654321',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
