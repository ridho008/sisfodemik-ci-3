<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_model extends CI_Model {
	public function getAllTentangKampus()
	{
		return $this->db->get('tentang_kampus')->result_array();
	}

	public function getTentangById($id)
	{
		return $this->db->get_where('tentang_kampus', ['id_tentang' => $id])->row_array();
	}

	public function aksiUbahTentang($data)
	{
		$id_tentang = $data['id_tentang'];
		$arr = [
			'sejarah' => $data['sejarah'],
			'visi' => $data['visi'],
			'misi' => $data['misi']
		];

		$this->db->set($arr);
		$this->db->where('id_tentang', $id_tentang);
		$this->db->update('tentang_kampus');
	}

	public function getTentangKampusForHome()
	{
		return $this->db->get_where('tentang_kampus', ['id_tentang' => '1'])->row_array();
	}

	

}