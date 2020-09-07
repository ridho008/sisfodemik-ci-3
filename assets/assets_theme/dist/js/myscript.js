$(function() {
	// Halaman Jurusan
	$('.tombolTambahJurusan').click(function() {
		$('#formJursanModalLabel').html('Tambah Data Jurusan');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#id_jurusan').val('');
		$('#kode_jurusan').val('');
		$('#nama_jurusan').val('');
	});

	$('.tombolUbahJurusan').click(function() {
		$('#formJursanModalLabel').html('Ubah Data Jurusan');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/sisfodemik-ci-3/admin/jurusan/ubahjurusan');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/jurusan/getubahjurusan',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				// console.log(data);
				$('#id_jurusan').val(data.id_jurusan);
				$('#kode_jurusan').val(data.kode_jurusan);
				$('#nama_jurusan').val(data.nama_jurusan);
			}
		});
	});


	// Halaman Program Studi
	$('.tombolTambahProdi').click(function() {
		$('#formProdiModalLabel').html('Tambah Data Prodi');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#id_prodi').val('');
		$('#kode_prodi').val('');
		$('#nama_prodi').val('');
		$('#nama_jurusan').val('');
	});

	$('.tombolUbahProdi').click(function() {
		$('#formProdiModalLabel').html('Ubah Data Prodi');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/sisfodemik-ci-3/admin/prodi/ubahprodi');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/prodi/getubahprodi',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				// console.log(data);
				$('#id_prodi').val(data.id_prodi);
				$('#kode_prodi').val(data.kode_prodi);
				$('#nama_prodi').val(data.nama_prodi);
				$('#nama_jurusan').val(data.id_jurusan);
			}
		});
	});


	// Halaman Mata Kuliah (DETAIL)
	$('.tombolDetailMatkul').click(function() {
		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/matkul/getdetailmatkul',
			data: {id: id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				console.log(data);
				$('#kode_matkul td').html(data.kode_matkul);
				$('#nama_matkul td').html(data.nama_matkul);
				$('#sks td').html(data.sks);
				$('#semester td').html(data.semester);
				$('#nama_prodi td').html(data.nama_prodi);
				$('#formMatkulDetailModalLabel').html('Detail Data Mata Kuliah <strong>' + data.kode_matkul + '</strong>');
			}
		});
	});



	// Halaman Program Studi (UBAH)
	$('.tombolTambahMatkul').click(function() {
		$('#formMatkulModalLabel').html('Tambah Data Matkul');
		$('.modal-footer button[type=submit]').html('Tambah');

		// $('#kode_matkul').val('');
		// Permasalahan
		// JIka di klik tombol ubah berhasil, lalu coba klik tombol tambah pasti kode matkulnya akan sama dengan kode di tombol ubah. jadi belum dapat menyelesaikan masalah tersebut.
		$('#nama_matkul').val('');
		$('#sks').val('');
		$('#semester').val('');
		$('#nama_prodi').val('');
	});

	$('.tombolUbahMatkul').click(function() {
		$('#formMatkulModalLabel').html('Ubah Data Matkul');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/sisfodemik-ci-3/admin/matkul/ubahmatkul');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/matkul/getubahmatkul',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				// console.log(data);
				$('#kode_matkul').val(data.kode_matkul);
				$('#nama_matkul').val(data.nama_matkul);
				$('#sks').val(data.sks);
				$('#semester').val(data.semester);
				$('#nama_prodi').val(data.id_prodi);
			}
		});
	});


	// Halaman Ubah Mahasiswa
	$('.tombolTambahMahasiswa').click(function() {
		$('#formMahasiswaModalLabel').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#id_mahasiswa').val('');
		$('#nim').val('');
		$('#nama').val('');
		$('#alamat').val('');
		$('#email').val('');
		$('#telepon').val('');
		$('#tmp_lahir').val('');
		$('#tgl_lahir').val('');
		$('#kelamin').val('');
		$('#nama_prodi').val('');
		$('#fotoLama').val('');
		$('#tampilFoto').attr('src', '');
	});

	$('.tombolUbahMahasiswa').click(function() {
		$('#formMahasiswaModalLabel').html('Ubah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/sisfodemik-ci-3/admin/mahasiswa/ubahmhs');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/mahasiswa/getubahmhs',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				// console.log(data);
				$('#id_mahasiswa').val(data.id_mahasiswa);
				$('#nim').val(data.nim);
				$('#nama').val(data.nama_lengkap);
				$('#alamat').val(data.alamat);
				$('#email').val(data.email);
				$('#telepon').val(data.telepon);
				$('#tmp_lahir').val(data.tmp_lahir);
				$('#tgl_lahir').val(data.tgl_lahir);
				// if($('input[type="radio"]').val('P')) {
				// 	// console.log(data.kelamin);
				// 	$('input[type="radio"]').prop('checked', data.kelamin);
				// } else if($('input[type="radio"]').val('L')) {
				// 	$('input[type="radio"]').prop('checked', data.kelamin);
				// }
				// if($('input[type="radio"]').val(data.kelamin) == 'L') {
				// 	$("input[name='kelamin']").prop('checked', 'checked');
				// }
				// if($('#kelamin').val(data.kelamin == 'P')) {
				// 	$('#kelamin').prop('checked', 'checked');
				// }
				// $('#kelamin').prop("checked") == data.kelamin ? 'L' : 'P';
				$('#kelamin').val(data.kelamin);
				$('#nama_prodi').val(data.id_prodi);
				$('#fotoLama').val(data.foto);
				$('#tampilFoto').attr('src', 'http://localhost/sisfodemik-ci-3/assets/img/foto_mahasiswa/' + data.foto);
			}
		});
	});



	// Halaman Tahun Akademik
	$('.tombolTambahTahunAka').click(function() {
		$('#formTahunAkaModalLabel').html('Tambah Data Tahun Akademik');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#id_tahun_aka').val('');
		$('#tahun_aka').val('');
		$('#semester').val('');
		$('#status').val('');
	});

	$('.tombolUbahTahunAka').click(function() {
		$('#formTahunAkaModalLabel').html('Ubah Data Tahun Akademik');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/sisfodemik-ci-3/admin/tahun_aka/ubahtahunaka');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/tahun_aka/getubahtahunaka',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				// console.log(data);
				$('#id_tahun_aka').val(data.id_tahun_aka);
				$('#tahun_aka').val(data.tahun_aka);
				$('#semester').val(data.semester);
				$('#status').val(data.status);
			}
		});
	});



	// Halaman Ubah Dosen
	$('.tombolTambahDosen').click(function() {
		$('#formDosenModalLabel').html('Tambah Data Dosen');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#id_dosen').val('');
		$('#nim').val('');
		$('#nama').val('');
		$('#alamat').val('');
		$('#email').val('');
		$('#telepon').val('');
		$('#kelamin').val('');
		$('#fotoLama').val('');
		$('#tampilFoto').attr('src', '');
	});

	$('.tombolUbahDosen').click(function() {
		$('#formDosenModalLabel').html('Ubah Data Dosen');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/sisfodemik-ci-3/admin/dosen/ubahdosen');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/dosen/getubahdosen',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				// console.log(data);
				$('#id_dosen').val(data.id_dosen);
				$('#nidn').val(data.nidn);
				$('#nama').val(data.nama_dosen);
				$('#alamat').val(data.alamat);
				$('#email').val(data.email);
				$('#telepon').val(data.telepon);
				$('#kelamin').val(data.kelamin);
				$('#fotoLama').val(data.foto_dosen);
				$('#tampilFoto').attr('src', 'http://localhost/sisfodemik-ci-3/assets/img/foto_dosen/' + data.foto_dosen);
			}
		});
	});


	// Halaman Pengaturan > Users
	$('.tombolTambahUser').click(function() {
		$('#formUserModalLabel').html('Tambah Data User');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#id_user').val('');
		$('#username').val('');
		$('#email').val('');
		$('#level').val('');
		$('#blokir').val('');
		$('#password').val('');
	});

	$('.tombolUbahUser').click(function() {
		$('#formUserModalLabel').html('Ubah Data User');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/sisfodemik-ci-3/admin/user/ubahuser');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/user/getubahuser',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				// console.log(data);
				$('#id_user').val(data.id_user);
				$('#username').val(data.username);
				$('#email').val(data.email);
				$('#level').val(data.level);
				$('#blokir').val(data.blokir);
				$('#password').val(data.password);
			}
		});
	});


	// Halaman Identitas Website
	$('.tombolUbahIdentitas').click(function() {
		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/identitas/getubahidentitas',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				// console.log(data);
				$('#id_identitas').val(data.id_identitas);
				$('#nama').val(data.nama_web);
				$('#alamat').val(data.alamat);
				$('#email').val(data.email);
				$('#telepon').val(data.telepon);
			}
		});
	});


	// Halaman Tentang Kampus
	$('.tombolUbahTentang').click(function() {
		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/tentang/getubahtentang',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				// console.log(data);
				$('#id_tentang').val(data.id_tentang);
				$('#sejarah').val(data.sejarah);
				$('#visi').val(data.visi);
				$('#misi').val(data.misi);
			}
		});
	});


	// Halaman Informasi Kampus
	$('.tombolTambahInfo').click(function() {
		$('#formInfoModalLabel').html('Tambah Data Informasi Kampus');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#id_user').val('');
	});

	$('.tombolUbahInfo').click(function() {
		$('#formInfoModalLabel').html('Ubah Data Informasi Kampus');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/sisfodemik-ci-3/admin/informasi/ubahinfo');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/sisfodemik-ci-3/admin/informasi/getubahinfo',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				console.log(data);
				$('#id_info').val(data.id_info);
				$('#icon').val(data.icon);
				$('#judul').val(data.judul_info);
				$('#isi').val(data.isi_info);
			}
		});
	});


});