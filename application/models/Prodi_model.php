<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_model extends CI_Model {
	public function getAllProdiJoinJurusan()
	{
		$this->db->select('*');
		$this->db->from('prodi');
		$this->db->join('jurusan', 'jurusan.id_jurusan = prodi.id_jurusan');
		$this->db->order_by('id_prodi', 'DESC');
		return $this->db->get()->result_array();
	}

	public function aksiProdiJurusan()
	{
		$data = [
				'kode_prodi' => htmlspecialchars($this->input->post('kode_prodi', true)),
				'nama_prodi' => htmlspecialchars($this->input->post('nama_prodi', true)),
				'id_jurusan' => htmlspecialchars($this->input->post('nama_jurusan', true))
		];

		$this->db->insert('prodi', $data);
	}

	public function getProdiId($id)
	{
		return $this->db->get_where('prodi', ['id_prodi' => $id])->row_array();
	}

	public function aksiUbahProdi($data)
	{
		$id_prodi = $data['id_prodi'];
		$arr = [
			'kode_prodi' => $data['kode_prodi'],
			'nama_prodi' => $data['nama_prodi'],
			'id_jurusan' => $data['nama_jurusan']
		];
		// var_dump($data); die;
		$this->db->set($arr);
		$this->db->where('id_prodi', $id_prodi);
		$this->db->update('prodi');
	}

}