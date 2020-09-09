<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {
	public function getAllLayanan($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('des_layanan', $keyword);
			$this->db->or_like('judul_layanan', $keyword);
		}
		$this->db->order_by('id_layanan', 'DESC');
		return $this->db->get('layanan', $limit, $start)->result_array();
	}

	public function aksiTambahLayanan()
	{
		$data = [
			'icon' => htmlspecialchars($this->input->post('icon', true)),
			'judul_layanan' => htmlspecialchars($this->input->post('judul', true)),
			'des_layanan' => htmlspecialchars($this->input->post('des', true))
		];

		$this->db->insert('layanan', $data);
	}


	public function getUbahLayananById($id)
	{
		return $this->db->get_where('layanan', ['id_layanan' => $id])->row_array();
	}

	public function aksiUbahLayanan($data)
	{
		$id_layanan = $data['id_layanan'];
		$arr = [
			'icon' => $data['icon'],
			'judul_layanan' => $data['judul'],
			'des_layanan' => $data['des']
		];
		// var_dump($data); die;
		$this->db->set($arr);
		$this->db->where('id_layanan', $id_layanan);
		$this->db->update('layanan');
	}

	public function getInformasiLayananForHome()
	{
		return $this->db->get('layanan')->result_array();
	}

}