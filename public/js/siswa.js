function showModal(button){
	var modal  = $('#myModal');
	var nis = $(button).data('nis');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	
	// Show Modal
	modal.find('h4').html('Ubah Data Siswa');
	modal.find('input[name=nis]').val(nis);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	// lanjutkan untuk inputan lainnya,.,.
	//.....
	
	modal.find('form.form-horizontal').prop('action', 'update&'+nis);
	modal.modal({backdrop: 'static', keyboard: false});
}