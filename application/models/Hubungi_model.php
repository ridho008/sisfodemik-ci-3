<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi_model extends CI_Model {
	public function getAllHubungi($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('email', $keyword);
			$this->db->or_like('nama', $keyword);
		}
		return $this->db->get('hubungi', $limit, $start)->result_array();
	}

	public function aksiTambahPesan()
	{
		$data = [
			'nama' => htmlspecialchars($this->input->post('nama', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'pesan' => htmlspecialchars($this->input->post('pesan', true)),
			'status' => '0'
		];

		$this->db->insert('hubungi', $data);
	}

	public function getPesanUserById($id)
	{
		return $this->db->get_where('hubungi', ['id_hubungi' => $id])->row_array();
	}

}