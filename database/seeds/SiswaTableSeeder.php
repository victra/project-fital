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
				'tlp_siswa' => '089897787766',
				'alamat_siswa' => 'Daerah Tugu Jogja',
				'nama_ayah' => 'MALIK',
				'nama_ibu' => 'ILMA',
				'tlp_ortu' => '08999999999',
				'alamat_ortu' => 'Daerah Tugu Jogja',
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
				'tlp_siswa' => '08123425345',
				'alamat_siswa' => 'Gembira Loka',
				'nama_ayah' => 'PERSIA',
				'nama_ibu' => 'SILMA',
				'tlp_ortu' => '08745983423',
				'alamat_ortu' => 'Gembira Loka',
				'created_at' => '2017-01-08 12:00:00',
				'updated_at' => '2017-01-08 12:01:00',
				'deleted_at' => NULL,
			),
			array (
				'id' => 3,
				'nis' => '00003',
				'nama' => 'JANCUK',
				'jkl' => LK,
				'agama' => KRISTEN,
				'kelas_id' => '3',
				'tlp_siswa' => '08545430980',
				'alamat_siswa' => 'Dekat Rumah Kepala Sekolah',
				'nama_ayah' => 'IDIN',
				'nama_ibu' => 'DILNA',
				'tlp_ortu' => '08868675654',
				'alamat_ortu' => 'Dekat Rumah Kepala Sekolah',
				'created_at' => '2017-01-09 12:00:00',
				'updated_at' => '2017-01-09 12:01:00',
				'deleted_at' => NULL,
			),
		));
	}

}
