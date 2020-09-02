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

});