function showModalKelas(button){
	var modal  = $('#ModalUbahKelas');
	var id = $(button).data('id');
	var nama_kelas = $(button).data('nama_kelas');
	var jurusan = $(button).data('jurusan');
	var thn_ajaran = $(button).data('thn_ajaran');
	var wali_kelas = $(button).data('wali_kelas');
	
	// Show Modal
	modal.find('h4').html('Ubaha Data Kelas');
	modal.find('input[name=nama_kelas]').val(nama_kelas);
	modal.find('select[name=jurusan]').val(jurusan);
	modal.find('input[name=thn_ajaran]').val(thn_ajaran);
	modal.find('select[name=wali_kelas]').val(wali_kelas);
		
	modal.find('form.form-horizontal').prop('action', 'updatekelas&'+id);
	modal.modal({backdrop: 'static', keyboard: false});
}