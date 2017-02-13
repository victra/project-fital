function showModalKelas(button){
	var modal  = $('#ModalUbahKelas');
	var nama_kelas = $(button).data('nama_kelas');
	var jurusan = $(button).data('jurusan');
	var wali_kelas = $(button).data('wali_kelas');
	
	// Show Modal
	modal.find('h4').html('Ubaha Data Kelas');
	modal.find('input[name=nama_kelas]').val(nama_kelas);
	modal.find('input[name=jurusan]').val(jurusan);
	modal.find('select[name=wali_kelas]').val(wali_kelas);
		
	modal.find('form.form-horizontal').prop('action', 'update&'+kd);
	modal.modal({backdrop: 'static', keyboard: false});
}