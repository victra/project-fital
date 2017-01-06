function showModalGuru(button){
	var modal  = $('#ModalUbahGuru');
	var nip = $(button).data('nip');
	var nama = $(button).data('nama');
	var username = $(button).data('username');
	var password = $(button).data('password');
	var role = $(button).data('role');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var kelas = $(button).data('telepon');
	
	// Show Modal
	modal.find('h4').html('Ubaha Data Guru');
	modal.find('input[name=nis]').val(nis);
	modal.find('input[name=nama]').val(nama);
	modal.find('input[name=username]').val(username);
	modal.find('input[name=password]').val(passsword);
	modal.find('select[name=role]').val(role);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	modal.find('select[name=agama]').val(agama);
	modal.find('select[name=tlp]').val(telepon);
		
	modal.find('form.form-horizontal').prop('action', 'update&'+nip);
	modal.modal({backdrop: 'static', keyboard: false});
}