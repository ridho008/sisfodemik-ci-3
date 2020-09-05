<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs_model extends CI_Model {
	public function getTahunAka()
	{
		return $query = $this->db->query("SELECT id_tahun_aka, semester, CONCAT(tahun_aka, '/') AS thn_semester FROM tahun_aka")->result();
	}


	public function getMhsId($nim)
	{
		// nim = berisi nim table (mahasiswa)
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi');
		$this->db->where('nim', $nim);
		return $this->db->get()->row();
	}

	public function getTahunAkaId($tahun_akad)
	{
		// tahun_akad = berisi id table (tahun_aka)
		// var_dump($tahun_akad); die;
		$this->db->where('id_tahun_aka', $tahun_akad);
		return $this->db->get('tahun_aka')->row();
	}

	public function getKrsId($id)
	{
		$this->db->where('id_krs', $id);
		return $this->db->get('krs')->row();
	}

	public function insert($data)
	{
		$this->db->insert('krs', $data);
	}

	public function AksiUpdateKRS()
	{
		$id_krs = $this->input->post('id_krs', true);
		$nim = $this->input->post('nim', true);
		$id_tahun_aka = $this->input->post('id_tahun_aka', true);
		$kode_matkul = $this->input->post('kode_matkul', true);

		$data = [
			'id_krs' => $id_krs,
			'id_tahun_aka' => $id_tahun_aka,
			'nim' => $nim,
			'kode_matkul' => $kode_matkul
		];

		$this->db->set($data);
		$this->db->where('id_krs', $id_krs);
		$this->db->update('krs');
	}


	// ------------------ INPUT NILAI----------------
	public function getKodeMatkulById($kode_matkul)
	{
		return $this->db->get_where('matkul', ['kode_matkul' => $kode_matkul])->row_array();
	}

	public function getMatkulByKodeMatkul($kode_matkul)
	{
		return $this->db->get_where('matkul', ['kode_matkul' => $kode_matkul])->row_array();
	}

	public function aksiQueryInputNilai($kode_matkul, $id_tahun_aka)
	{
		$this->db->select('krs.id_krs, krs.nim, mahasiswa.nama_lengkap, krs.nilai, matkul.nama_matkul');
		$this->db->from('krs');
		$this->db->join('mahasiswa', 'mahasiswa.nim = krs.nim');
		$this->db->join('matkul', 'matkul.kode_matkul = krs.kode_matkul');
		$this->db->where('krs.id_tahun_aka', $id_tahun_aka);
		$this->db->where('krs.kode_matkul', $kode_matkul);
		return $this->db->get()->result();
	}

	public function getKrsByIdArr($id_krs)
	{
		$this->db->select('*');
		$this->db->from('matkul');
		$this->db->join('krs', 'krs.kode_matkul = matkul.kode_matkul');
		$this->db->join('tahun_aka', 'tahun_aka.id_tahun_aka = krs.id_tahun_aka');
		$this->db->join('mahasiswa', 'mahasiswa.nim = krs.nim');
		$this->db->where('krs.id_krs', $id_krs);
		return $this->db->get()->row();
	}

	public function getKrsByMatkulArr($kode_matkul)
	{
		$this->db->select('*');
		$this->db->from('matkul');
		$this->db->join('krs', 'krs.kode_matkul = matkul.kode_matkul');
		$this->db->join('mahasiswa', 'mahasiswa.nim = krs.nim');
		$this->db->where('krs.kode_matkul', $kode_matkul);
		return $this->db->get()->result();
	}


}