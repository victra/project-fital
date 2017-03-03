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
			array (
				'id' => 1,
				'check_by_id' => '00001',
				'siswa_id' => '1',
				'kelas_id' => '1',
				'status' => "I",
				'description' => 'ijin',
				'date' => '2017-03-02',				
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 2,
				'check_by_id' => '00002',
				'siswa_id' => '1',
				'kelas_id' => '1',
				'status' => "S",
				'description' => 'sakit',
				'date' => '2017-03-03',				
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 3,
				'check_by_id' => '00001',
				'siswa_id' => '3',
				'kelas_id' => '3',
				'status' => "I",
				'description' => 'ijin',
				'date' => '2017-03-02',				
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 4,
				'check_by_id' => '00002',
				'siswa_id' => '3',
				'kelas_id' => '3',
				'status' => "H",
				'description' => '',
				'date' => '2017-03-03',				
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 5,
				'check_by_id' => '00001',
				'siswa_id' => '2',
				'kelas_id' => '2',
				'status' => "A",
				'description' => 'tidak masuk',
				'date' => '2017-03-02',				
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 6,
				'check_by_id' => '00002',
				'siswa_id' => '2',
				'kelas_id' => '2',
				'status' => "H",
				'description' => '',
				'date' => '2017-03-03',				
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
