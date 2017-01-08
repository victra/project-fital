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
		\DB::table('guru')->delete();
        
		\DB::table('guru')->insert(array ( 
			array (
				'id' => 1,
				'nip' => '00001',
				'nama' => 'Dark King',
				'username' => 'dk',
				'password' => Hash::make('password'),
				'role' => 'administrator',
				'jkl' => 'Laki-Laki',
				'agama' => 'Islam',
				'tlp' => '0987654321',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
