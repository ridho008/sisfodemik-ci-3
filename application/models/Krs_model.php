<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs_model extends CI_Model {
	public function getTahunAka()
	{
		return $query = $this->db->query("SELECT id_tahun_aka, semester, CONCAT(tahun_aka, '/') AS thn_semester FROM tahun_aka")->result();
	}

	public function getMhsId($nim)
	{
		return $this->db->get_where('mahasiswa', ['nim' => $nim])->result_array();
	}

}