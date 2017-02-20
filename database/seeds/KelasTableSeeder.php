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
				'thn_ajaran' => '2016/2017',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 2,
				'nama_kelas' => XAK2,
				'jurusan' => AK,
				'thn_ajaran' => '2016/2017',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 3,
				'nama_kelas' => XAK3,
				'jurusan' => AK,
				'thn_ajaran' => '2016/2017',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 4,
				'nama_kelas' => XRPL1,
				'jurusan' => RPL,
				'thn_ajaran' => '2016/2017',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 5,
				'nama_kelas' => XRPL2,
				'jurusan' => RPL,
				'thn_ajaran' => '2016/2017',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 6,
				'nama_kelas' => XFARMASI,
				'jurusan' => RPL,
				'thn_ajaran' => '2016/2017',
				'wali_kelas_id' => '1',
				'created_at' => '2017-01-07 12:00:00',
				'updated_at' => '2017-01-07 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
