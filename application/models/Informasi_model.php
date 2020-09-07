<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_model extends CI_Model {
	public function getAllInformasi($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('judul_info', $keyword);
			$this->db->or_like('isi_info', $keyword);
		}
		$this->db->order_by('id_info', 'DESC');
		return $this->db->get('info_kampus', $limit, $start)->result_array();
	}

	public function aksiTambahInformasi()
	{
		$data = [
			'icon' => htmlspecialchars($this->input->post('icon', true)),
			'judul_info' => htmlspecialchars($this->input->post('judul', true)),
			'isi_info' => htmlspecialchars($this->input->post('isi', true))
		];

		$this->db->insert('info_kampus', $data);
	}

	public function getInformasiKampusForHome()
	{
		return $this->db->get('info_kampus')->result_array();
	}

	public function getUbahInfoById($id)
	{
		return $this->db->get_where('info_kampus', ['id_info' => $id])->row_array();
	}

	public function aksiUbahInfo($data)
	{
		$id_info = $data['id_info'];
		$arr = [
			'icon' => $data['icon'],
			'judul_info' => $data['judul'],
			'isi_info' => $data['isi']
		];

		$this->db->set($arr);
		$this->db->where('id_info', $id_info);
		$this->db->update('info_kampus');
	}

}