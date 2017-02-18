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
				'jkl' => PR,
				'agama' => ISLAM,
				'kelas_id' => '1',
				'alamat' => 'Gedong Kuning',
				'nama_ortu' => 'MALIK',
				'tlp_ortu' => '08999999999',
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
				'kelas_id' => '2',
				'alamat' => 'Prambanan',
				'nama_ortu' => 'ANTASARI',
				'tlp_ortu' => '08988888878',
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
				'kelas_id' => '3',
				'alamat' => 'Sleman',
				'nama_ortu' => 'RIZKI',
				'tlp_ortu' => '08912312312',
				'created_at' => '2017-01-09 12:00:00',
				'updated_at' => '2017-01-09 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
