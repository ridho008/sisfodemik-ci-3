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


});