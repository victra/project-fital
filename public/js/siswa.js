function showModalSiswa(button){
	var modal  = $('#ModalUbahSiswa');
	var nis = $(button).data('nis');
	var nama = $(button).data('nama');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var kelas = $(button).data('kelas');
	var tlp_siswa = $(button).data('tlp-siswa');
	var alamat_siswa = $(button).data('alamat-siswa');
	var nama_ayah = $(button).data('nama-ayah');
	var nama_ibu = $(button).data('nama-ibu');
	var tlp_ortu = $(button).data('tlp-ortu');
	var alamat_ortu = $(button).data('alamat-ortu');
	
	// Show Modal
	modal.find('h4').html('Ubah Data Siswa');
	modal.find('input[name=nis]').val(nis);
	modal.find('input[name=nama]').val(nama);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	modal.find('select[name=agama]').val(agama);
	modal.find('select[name=kelas]').val(kelas);
	modal.find('input[name=tlp_siswa]').val(tlp_siswa);
	modal.find('textarea[name=alamat_siswa]').val(alamat_siswa);
	modal.find('input[name=nama_ayah]').val(nama_ayah);
	modal.find('input[name=nama_ibu]').val(nama_ibu);
	modal.find('input[name=tlp_ortu]').val(tlp_ortu);
	modal.find('textarea[name=alamat_ortu]').val(alamat_ortu);
		
	modal.find('form.form-horizontal').prop('action', 'update&'+nis);
	modal.modal({backdrop: 'static', keyboard: false});
}