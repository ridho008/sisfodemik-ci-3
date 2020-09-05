<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transkrip_nilai_model extends CI_Model {
	public function getKrsByNim()
	{
		$nim = htmlspecialchars($this->input->post('nim', true));

		$this->db->select('*');
		$this->db->from('krs');
		$this->db->where('nim', $nim);
		return $query = $this->db->get()->row();

		$this->db->select('*');
		$this->db->from('krs');
		$this->db->where('nim', $nim);
		$ok = $this->db->get()->row();
		foreach($ok as $value) {
			cekNilai($value->nim, $value->kode_matkul, $value->nilai);
		}

		// var_dump($query); die;
	}

	public function getTranskripByNim()
	{
		$nim = htmlspecialchars($this->input->post('nim', true));

		$this->db->select('tn.kode_matkul, matkul.nama_matkul, matkul.sks, tn.nilai');
		$this->db->from('transkrip_nilai as tn');
		$this->db->join('matkul', 'matkul.kode_matkul = tn.kode_matkul');
		$this->db->where('nim', $nim);
		
		return $transkrip = $this->db->get()->result();
		// var_dump($transkrip); die;
	}

	public function getMhsByNim()
	{
		$nim = htmlspecialchars($this->input->post('nim', true));
		return $mhs = $this->db->select('*')
						->from('mahasiswa')
						->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi')
						->where(['nim' => $nim])
						->get()->row();
						// var_dump($mhs); die;

		// return $prodi = $this->db->select('nama_prodi')
		// 				->from('prodi')
		// 				->where(['id_prodi' => $mhs->id_prodi])
		// 				->get()->row()->nama_prodi;
	}

	public function masuk($data)
	{
		$this->db->insert('transkrip_nilai', $data);
	}

	public function update($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id_transkrip', $id);
		$this->db->update('transkrip_nilai');
	}

}