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

function showModalGuru(button){
	var modal  = $('#ModalUbahGuru');
	var id = $(button).data('id');
	var nip = $(button).data('nip');
	var nama = $(button).data('nama');
	var username = $(button).data('username');
	// var password = $(button).data('password');
	var role = $(button).data('role');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var tlp = $(button).data('tlp');
	var jadwal = $(button).data('jadwal');
	
	modal.find('h4').html('Ubah Data User');
	modal.find('input[name=id]').val(id);
	modal.find('input[name=nip]').val(nip);
	modal.find('input[name=nama]').val(nama);
	modal.find('input[name=username]').val(username);
	// modal.find('input[name=password]').val(password);
	modal.find('select[name=role]').val(role);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	modal.find('select[name=agama]').val(agama);
	modal.find('input[name=tlp]').val(tlp);
	modal.find('select[name=jadwal]').val(jadwal);
		
	modal.find('form.form-horizontal').prop('action', 'updateguru&'+id);
	modal.modal({backdrop: 'static', keyboard: false});
}

function showModalInfoSiswa(button){
	var modal  = $('#ModalInfoSiswa');
	var id = $(button).data('id');
	var nis = $(button).data('nis');
	var nama = $(button).data('nama');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var kelas = $(button).data('kelas');
	var tlp_siswa = $(button).data('tlp-siswa');
	var alamat_siswa = $(button).data('alamat-siswa');
	var nama_ayah = $(button).data('nama-ayah');
	var nama_ibu = $(button).data('nama-ibu');
	var tlp_ortu = $(button).data('tlp-ortu');
	var alamat_ortu = $(button).data('alamat-ortu');
	
	modal.find('label[for=nis]').html(nis);
	modal.find('label[for=nama]').html(nama);
	modal.find('label[for=jkl]').html(jenis_kelamin);
	modal.find('label[for=agama]').html(agama);
	modal.find('label[for=kelas]').html(kelas);
	modal.find('label[for=tlp_siswa]').html(tlp_siswa);
	modal.find('label[for=alamat_siswa]').html(alamat_siswa);
	modal.find('label[for=nama_ayah]').html(nama_ayah);
	modal.find('label[for=nama_ibu]').html(nama_ibu);
	modal.find('label[for=tlp_ortu]').html(tlp_ortu);
	modal.find('label[for=alamat_ortu]').html(alamat_ortu);
		
	modal.modal({backdrop: 'static', keyboard: false});
}

function showModalKelas(button){
	var modal  = $('#ModalUbahKelas');
	var id = $(button).data('id');
	var nama_kelas = $(button).data('nama_kelas');
	var jurusan = $(button).data('jurusan');
	var thn_ajaran = $(button).data('thn_ajaran');
	var wali_kelas = $(button).data('wali_kelas');
	
	modal.find('h4').html('Ubah Data Kelas');
	modal.find('input[name=id]').val(id);
	modal.find('input[name=nama_kelas]').val(nama_kelas);
	modal.find('select[name=jurusan]').val(jurusan);
	modal.find('input[name=thn_ajaran]').val(thn_ajaran);
	modal.find('select[name=wali_kelas]').val(wali_kelas);
		
	modal.find('form.form-horizontal').prop('action', 'updatekelas&'+id);
	modal.modal({backdrop: 'static', keyboard: false});
}

function showModalPiket(button){
	var modal  = $('#ModalUbahPiket');
	var id = $(button).data('id');
	var nip = $(button).data('nip');
	var nama = $(button).data('nama');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var tlp = $(button).data('tlp');
	var jadwal = $(button).data('jadwal');
	
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

function showModalSemester(button){
	var modal  = $('#ModalUbahSemester');
	var id = $(button).data('id');
	var nama_semester = $(button).data('nama-semester');
	var tgl_awal = $(button).data('tgl-awal');
	var tgl_akhir = $(button).data('tgl-akhir');
	
	modal.find('h4').html('Ubah Data Semester');
	modal.find('input[name=id]').val(id);
	modal.find('input[name=nama_semester]').val(nama_semester);
	modal.find('input[name=tgl_awal]').val(tgl_awal);
	modal.find('input[name=tgl_akhir]').val(tgl_akhir);
		
	modal.find('form.form-horizontal').prop('action', 'updatesemester&'+id);
	modal.modal({backdrop: 'static', keyboard: false});
}

function showModalSiswa(button){
	var modal  = $('#ModalUbahSiswa');
	var id = $(button).data('id');
	var nis = $(button).data('nis');
	var nama = $(button).data('nama');
	var jenis_kelamin = $(button).data('jenis-kelamin');
	var agama = $(button).data('agama');
	var kelas = $(button).data('kelas');
	var tlp_siswa = $(button).data('tlp-siswa');
	var alamat_siswa = $(button).data('alamat-siswa');
	var nama_ayah = $(button).data('nama-ayah');
	var nama_ibu = $(button).data('nama-ibu');
	var tlp_ortu = $(button).data('tlp-ortu');
	var alamat_ortu = $(button).data('alamat-ortu');
	
	modal.find('h4').html('Ubah Data Siswa');
	modal.find('input[name=id]').val(id);
	modal.find('input[name=nis]').val(nis);
	modal.find('input[name=nama]').val(nama);
	modal.find('select[name=jkl]').val(jenis_kelamin);
	modal.find('select[name=agama]').val(agama);
	modal.find('select[name=kelas]').val(kelas);
	modal.find('input[name=tlp_siswa]').val(tlp_siswa);
	modal.find('textarea[name=alamat_siswa]').val(alamat_siswa);
	modal.find('input[name=nama_ayah]').val(nama_ayah);
	modal.find('input[name=nama_ibu]').val(nama_ibu);
	modal.find('input[name=tlp_ortu]').val(tlp_ortu);
	modal.find('textarea[name=alamat_ortu]').val(alamat_ortu);
		
	modal.find('form.form-horizontal').prop('action', 'updatesiswa&'+id);
	modal.modal({backdrop: 'static', keyboard: false});
}