function showModalPiket(button){
	var modal  = $('#ModalUbahPiket');
	var id = $(button).data('id');
	var nip = $(button).data('nip');
	var nama = $(button).data('nama');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var tlp = $(button).data('tlp');
	var jadwal = $(button).data('jadwal');
	
	// Show Modal
	modal.find('h4').html('Ubah Data Guru Piket');
	modal.find('input[name=id]').val(id);
	modal.find('input[name=nip]').val(nip);
	modal.find('input[name=nama]').val(nama);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	modal.find('select[name=agama]').val(agama);
	modal.find('input[name=tlp]').val(tlp);
	modal.find('select[name=jadwal]').val(jadwal);
		
	modal.find('form.form-horizontal').prop('action', 'updatepiket&'+id);
	modal.modal({backdrop: 'static', keyboard: false});
}