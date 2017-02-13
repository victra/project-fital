function showModalSiswa(button){
	var modal  = $('#ModalUbahSiswa');
	var nis = $(button).data('nis');
	var nama = $(button).data('nama');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var kelas = $(button).data('kelas_id');
	
	// Show Modal
	modal.find('h4').html('Ubaha Data Siswa');
	modal.find('input[name=nis]').val(nis);
	modal.find('input[name=nama]').val(nama);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	modal.find('select[name=agama]').val(agama);
	modal.find('select[name=kelas]').val(kelas);
		
	modal.find('form.form-horizontal').prop('action', 'update&'+nis);
	modal.modal({backdrop: 'static', keyboard: false});
}