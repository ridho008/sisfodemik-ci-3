<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_aka_model extends CI_Model {
	public function getAllTahunAka($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('tahun_aka', $keyword);
			$this->db->or_like('semester', $keyword);
			$this->db->or_like('status', $keyword);
		}
		$this->db->order_by('id_tahun_aka', 'DESC');
		return $this->db->get('tahun_aka')->result_array();
	}

	public function aksiTambahTahunAka()
	{
		$data = [
				'tahun_aka' => htmlspecialchars($this->input->post('tahun_aka', true)),
				'semester' => htmlspecialchars($this->input->post('semester', true)),
				'status' => htmlspecialchars($this->input->post('status', true))
		];

		$this->db->insert('tahun_aka', $data);
	}	

	public function getTahunAkaId($id)
	{
		return $this->db->get_where('tahun_aka', ['id_tahun_aka' => $id])->row_array();
	}

	public function aksiUbahTahunAka($data)
	{
		$id_tahun_aka = $data['id_tahun_aka'];
		$arr = [
				'tahun_aka' => $data['tahun_aka'],
				'semester' => $data['semester'],
				'status' => $data['status']
		];
		$this->db->where('id_tahun_aka', $id_tahun_aka);
		$this->db->update('tahun_aka', $arr);
	}

}