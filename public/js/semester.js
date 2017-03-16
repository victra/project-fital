function showModalSemester(button){
	var modal  = $('#ModalUbahSemester');
	var id = $(button).data('id');
	var nama_semester = $(button).data('nama_semester');
	var tgl_awal = $(button).data('tgl_awal');
	var tgl_akhir = $(button).data('tgl_akhir');
	
	// Show Modal
	modal.find('h4').html('Ubaha Data Semester');
	modal.find('input[name=id]').val(id);
	modal.find('input[name=nama_semester]').val(nama_semester);
	modal.find('input[name=tgl_awal]').val(tgl_awal);
	modal.find('input[name=tgl_akhir]').val(tgl_akhir);
		
	modal.find('form.form-horizontal').prop('action', 'updatesemester&'+id);
	modal.modal({backdrop: 'static', keyboard: false});
}