function showModalProfil(button){
	var modal  = $('#ModalUbahProfil');
	var id = $(button).data('id');
	var nip = $(button).data('nip');
	var nama = $(button).data('nama');
	var username = $(button).data('username');
	var jadwal = $(button).data('jadwal');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var tlp = $(button).data('tlp');
	
	// Show Modal
	// modal.find('h4').html('Ubah Profil');
	modal.find('input[name=id]').val(id);
	modal.find('input[name=nip]').val(nip);
	modal.find('input[name=nama]').val(nama);
	modal.find('input[name=username]').val(username);
	modal.find('select[name=jadwal]').val(jadwal);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	modal.find('select[name=agama]').val(agama);
	modal.find('input[name=tlp]').val(tlp);
		
	modal.find('form.form-horizontal').prop('action', 'updateprofil&'+id);
	modal.modal({backdrop: 'static', keyboard: false});
}