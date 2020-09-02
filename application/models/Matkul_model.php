<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul_model extends CI_Model {
	public function getMatkulProdi($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('kode_matkul', $keyword);
			$this->db->or_like('nama_matkul', $keyword);
		}
		$this->db->select('*');
		$this->db->from('matkul');
		$this->db->join('prodi', 'prodi.id_prodi = matkul.id_prodi');
		$this->db->order_by('kode_matkul', 'DESC');
		return $this->db->get('', $limit, $start)->result_array();
	}

	public function cekKodeMatkul()
	{
		$query = $this->db->query("SELECT MAX(kode_matkul) as kodematkul FROM matkul")->row();
		return $query->kodematkul;
	}

	public function aksiTambahMatkul()
	{
		$data = [
				'kode_matkul' => htmlspecialchars($this->input->post('kode_matkul', true)),
				'nama_matkul' => htmlspecialchars($this->input->post('nama_matkul', true)),
				'sks' => htmlspecialchars($this->input->post('sks', true)),
				'semester' => htmlspecialchars($this->input->post('semester', true)),
				'id_prodi' => htmlspecialchars($this->input->post('nama_prodi', true))
		];

		$this->db->insert('matkul', $data);
	}

	public function aksiUbahMatkul($data)
	{
		$id_matkul = $data['kode_matkul'];
		$data = [
				'nama_matkul' => $data['nama_matkul'],
				'sks' => $data['sks'],
				'semester' => $data['semester'],
				'id_prodi' => $data['nama_prodi']
		];
		// var_dump($data); die;
		$this->db->where('kode_matkul', $id_matkul);
		$this->db->update('matkul', $data);
	}

	public function getDetailJoinProdi($kode)
	{
		$this->db->select('*');
		$this->db->from('matkul');
		$this->db->join('prodi', 'prodi.id_prodi = matkul.id_prodi');
		$this->db->where('kode_matkul', $kode);
		return $this->db->get('')->row_array();
	}

	public function getMatkulId($kode)
	{
		return $this->db->get_where('matkul', ['kode_matkul' => $kode])->row_array();
	}

}