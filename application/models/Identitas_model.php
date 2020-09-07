<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas_model extends CI_Model {
	public function getAllIdentitas($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('nama_web', $keyword);
			$this->db->or_like('alamat', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('telepon', $keyword);
		}
		return $this->db->get('idenditas', $limit, $start)->result_array();
	}

	public function getIdentitasById($id)
	{
		return $this->db->get_where('idenditas', ['id_identitas' => $id])->row_array();
	}

	public function aksiUbahIdentitas($data)
	{
		$id_identitas = $data['id_identitas'];
		// var_dump($data); die;

		$arr = [
			'nama_web' => $data['nama'],
			'alamat' => $data['alamat'],
			'email' => $data['email'],
			'telepon' => $data['telepon']
		];

		$this->db->set($arr);
		$this->db->where('id_identitas', $id_identitas);
		$this->db->update('idenditas');
	}


	// ================== HOME ======================
	public function getAllIdentitasHome()
	{
		return $this->db->get('idenditas')->result_array();
	}

	

}