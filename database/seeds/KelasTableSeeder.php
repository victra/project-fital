<?php

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('kelas')->delete();
        
		\DB::table('kelas')->insert(array ( 
			array (
				'id' => 1,
				'kd' => 'XAK1',
				'nama_kelas' => 'X AK 1',
				'jurusan' => 'Akutansi',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 2,
				'kd' => 'XAK2',
				'nama_kelas' => 'X AK 2',
				'jurusan' => 'Akutansi',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 3,
				'kd' => 'XAK3',
				'nama_kelas' => 'X AK 3',
				'jurusan' => 'Akutansi',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 4,
				'kd' => 'XRPL1',
				'nama_kelas' => 'X RPL 1',
				'jurusan' => 'Rekayasa Perangkat Lunak',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 5,
				'kd' => 'XRPL2',
				'nama_kelas' => 'X RPL 2',
				'jurusan' => 'Rekayasa Perangkat Lunak',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 6,
				'kd' => 'XFARMASI',
				'nama_kelas' => 'X FARMASI',
				'jurusan' => 'Farmasi',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
