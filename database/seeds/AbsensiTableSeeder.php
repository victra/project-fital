<?php

use Illuminate\Database\Seeder;

class AbsensiTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('absensi')->delete();
        
		\DB::table('absensi')->insert(array ( 
			
			// array (
			// 	'id' => 1,
			// 	'check_by_id' => '43',
			// 	'siswa_id' => '1',
			// 	'kelas_id' => '1',
			// 	'status' => "I",
			// 	'description' => 'ijin',
			// 	'date' => '2016-07-04',				
			// 	'created_at' => '2017-01-07 12:00:00',
			// 	'updated_at' => '2017-01-07 12:01:00',
			// 	'deleted_at' => NULL,
			// ),

			// array (
			// 	'id' => 1,
			// 	'check_by_id' => '43',
			// 	'siswa_id' => '1',
			// 	'kelas_id' => '1',
			// 	'status' => "I",
			// 	'description' => 'ijin',
			// 	'date' => '2017-05-31',				
			// 	'created_at' => '2017-01-07 12:00:00',
			// 	'updated_at' => '2017-01-07 12:01:00',
			// 	'deleted_at' => NULL,
			// ),
		
		));
	}

}
