function showModalInfoSiswa(button){
	var modal  = $('#ModalInfoSiswa');
	var id = $(button).data('id');
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
	// modal.find('h4').html('Ubah Data Siswa');
	// modal.find('input[name=id]').val(id);
	modal.find('label[for=nis]').html(nis);
	modal.find('label[for=nama]').html(nama);
	modal.find('label[for=jkl]').html(jenis_kelamin);
	modal.find('label[for=agama]').html(agama);
	modal.find('label[for=kelas]').html(kelas);
	modal.find('label[for=tlp_siswa]').html(tlp_siswa);
	modal.find('label[for=alamat_siswa]').html(alamat_siswa);
	modal.find('label[for=nama_ayah]').html(nama_ayah);
	modal.find('label[for=nama_ibu]').html(nama_ibu);
	modal.find('label[for=tlp_ortu]').html(tlp_ortu);
	modal.find('label[for=alamat_ortu]').html(alamat_ortu);
		
	// modal.find('form.form-horizontal').prop('action', 'updatesiswa&'+id);
	modal.modal({backdrop: 'static', keyboard: false});
}