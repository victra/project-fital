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
				'nama_kelas' => XAK1,
				'jurusan' => AK,
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 2,
				'nama_kelas' => XAK2,
				'jurusan' => AK,
				'wali_kelas_id' => '2',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 3,
				'nama_kelas' => XAK3,
				'jurusan' => AK,
				'wali_kelas_id' => '3',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 4,
				'nama_kelas' => XFARMASI,
				'jurusan' => FMS,
				'wali_kelas_id' => '4',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 5,
				'nama_kelas' => XRPL1,
				'jurusan' => RPL,
				'wali_kelas_id' => '5',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 6,
				'nama_kelas' => XRPL2,
				'jurusan' => RPL,
				'wali_kelas_id' => '6',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 7,
				'nama_kelas' => XIAK1,
				'jurusan' => AK,
				'wali_kelas_id' => '7',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 8,
				'nama_kelas' => XIAK2,
				'jurusan' => AK,
				'wali_kelas_id' => '8',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 9,
				'nama_kelas' => XIFARMASI,
				'jurusan' => FMS,
				'wali_kelas_id' => '9',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 10,
				'nama_kelas' => XIRPL1,
				'jurusan' => RPL,
				'wali_kelas_id' => '10',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 11,
				'nama_kelas' => XIRPL2,
				'jurusan' => RPL,
				'wali_kelas_id' => '11',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 12,
				'nama_kelas' => XIIAK1,
				'jurusan' => AK,
				'wali_kelas_id' => '12',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 13,
				'nama_kelas' => XIIAK2,
				'jurusan' => AK,
				'wali_kelas_id' => '13',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 14,
				'nama_kelas' => XIIFARMASI,
				'jurusan' => FMS,
				'wali_kelas_id' => '14',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 15,
				'nama_kelas' => XIIRPL1,
				'jurusan' => RPL,
				'wali_kelas_id' => '15',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 16,
				'nama_kelas' => XIIRPL2,
				'jurusan' => RPL,
				'wali_kelas_id' => '16',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
