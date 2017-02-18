function showModalSiswa(button){
	var modal  = $('#ModalUbahSiswa');
	var nis = $(button).data('nis');
	var nama = $(button).data('nama');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var kelas = $(button).data('kelas');
	var alamat = $(button).data('alamat');
	var nama_ortu = $(button).data('nama-ortu');
	var tlp_ortu = $(button).data('tlp-ortu');
	
	// Show Modal
	modal.find('h4').html('Ubaha Data Siswa');
	modal.find('input[name=nis]').val(nis);
	modal.find('input[name=nama]').val(nama);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	modal.find('select[name=agama]').val(agama);
	modal.find('select[name=kelas]').val(kelas);
	modal.find('textarea[name=alamat]').val(alamat);
	modal.find('input[name=namaortu]').val(nama_ortu);
	modal.find('input[name=tlportu]').val(tlp_ortu);
		
	modal.find('form.form-horizontal').prop('action', 'update&'+nis);
	modal.modal({backdrop: 'static', keyboard: false});
}