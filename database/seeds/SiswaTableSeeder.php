<?php

use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('siswa')->delete();
        
		\DB::table('siswa')->insert(array ( 
			array (
				'id' => 1,
				'nis' => '00001',
				'nama' => 'TELEK',
				'jkl' => LK,
				'agama' => ISLAM,
				'kelas' => 'X AK 1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 2,
				'nis' => '00002',
				'nama' => 'ASU',
				'jkl' => LK,
				'agama' => KATOLIK,
				'kelas' => 'X AK 1',
				'created_at' => '2017-01-08 12:00:00',
				'updated_at' => '2017-01-08 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 3,
				'nis' => '00003',
				'nama' => 'JANCUK',
				'jkl' => LK,
				'agama' => HINDU,
				'kelas' => 'X AK 1',
				'created_at' => '2017-01-09 12:00:00',
				'updated_at' => '2017-01-09 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
