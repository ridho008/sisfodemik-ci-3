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