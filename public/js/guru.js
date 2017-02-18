function showModalGuru(button){
	var modal  = $('#ModalUbahGuru');
	var nip = $(button).data('nip');
	var nama = $(button).data('nama');
	var username = $(button).data('username');
	// var password = $(button).data('password');
	var role = $(button).data('role');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var tlp = $(button).data('tlp');
	
	// Show Modal
	modal.find('h4').html('Ubaha Data Guru');
	modal.find('input[name=nip]').val(nip);
	modal.find('input[name=nama]').val(nama);
	modal.find('input[name=username]').val(username);
	// modal.find('input[name=password]').val(password);
	modal.find('select[name=role]').val(role);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	modal.find('select[name=agama]').val(agama);
	modal.find('input[name=tlp]').val(tlp);
		
	modal.find('form.form-horizontal').prop('action', 'updateguru&'+nip);
	modal.modal({backdrop: 'static', keyboard: false});
}