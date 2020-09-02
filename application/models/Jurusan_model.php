<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {
	public function getAllJurusan($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('kode_jurusan', $keyword);
			$this->db->or_like('nama_jurusan', $keyword);
		}
		return $this->db->get('jurusan', $limit, $start)->result_array();
	}

	public function aksiTambahJurusan()
	{
		$data = [
				'kode_jurusan' => htmlspecialchars($this->input->post('kode_jurusan', true)),
				'nama_jurusan' => htmlspecialchars($this->input->post('nama_jurusan', true)),
		];

		$this->db->insert('jurusan', $data);
	}

	public function getJurusanId($id)
	{
		return $this->db->get_where('jurusan', ['id_jurusan' => $id])->row_array();
	}

	public function aksiUbahJurusan($data)
	{
		$id_jurusan = $data['id_jurusan'];
		$arr = [
			'kode_jurusan' => $data['kode_jurusan'],
			'nama_jurusan' => $data['nama_jurusan']
		];
		// var_dump($data); die;
		$this->db->set($arr);
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->update('jurusan');
	}

}