<?php

use Illuminate\Database\Seeder;

class SemesterTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('semester')->delete();
        
		\DB::table('semester')->insert(array ( 
			array (
				'id' => 1,
				'semester' => 'Semester Gasal',
				'tgl_awal' => '2016-07-04',
				'tgl_akhir' => '2016-12-17',				
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 2,
				'semester' => 'Semester Genap',
				'tgl_awal' => '2017-01-02',
				'tgl_akhir' => '2017-06-10',				
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
