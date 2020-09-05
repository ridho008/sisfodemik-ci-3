<?php

function cekLogin()
{
	$ci = get_instance();
	if(!$ci->session->userdata('level') == 'admin') {
		redirect('auth');
	} else if(!$ci->session->userdata('level') == 'user') {
		redirect('auth');
	}
}

function cekMenu()
{
	$ci = get_instance();
	if($ci->session->userdata('level') == 'user') {
		redirect('user/dashboard');
	}
}

function skorNilai($nilai, $sks)
{
	if($nilai == 'A') $skor = 4 * $sks;
	elseif($nilai == 'B') $skor = 3 * $sks;
	elseif($nilai == 'C') $skor = 2 * $sks;
	elseif($nilai == 'D') $skor = 1 * $sks;
	else $skor = 0;
	return $skor;
}

function cekNilai($nim, $kode_matkul, $nilai)
{
	$ci = get_instance();
	$ci->load->model('Transkrip_nilai_model');

	$ci->db->select('*');
	$ci->db->from('transkrip_nilai');
	$ci->db->where('nim', $nim);
	$ci->db->where('kode_matkul', $kode_matkul);
	$query = $ci->db->get()->row();

	if($query != null) {
		if($nilai < $query->nilai) {
			$ci->db->set('nilai', $nilai);
			$ci->db->where('nim', $nim);
			$ci->db->where('kode_matkul', $kode_matkul);
			$ci->db->update('transkrip_nilai');
		} 
	} else {
		$data = [
				'nim' => $nim,
				'kode_matkul' => $kode_matkul,
				'nilai' => $nilai
		];

		$ci->Transkrip_nilai_model->masuk($data);
	}
}