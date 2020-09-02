<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {
	public function getAllJoinMahasiswaProdi()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi');
		return $this->db->get()->result_array();
	}

	public function aksiTambahMahasiswa()
	{
		$foto = $_FILES['foto']['name'];

		if($foto) {
			$config['allowed_types'] = 'png|jpg';
			$config['max_sizes'] = '2048';
			$config['upload_path'] = './assets/img/foto_mahasiswa/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
			'nim' => htmlspecialchars($this->input->post('nim', true)),
			'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
			'alamat' => htmlspecialchars($this->input->post('alamat', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'telepon' => htmlspecialchars($this->input->post('telepon', true)),
			'tmp_lahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
			'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
			'kelamin' => htmlspecialchars($this->input->post('kelamin', true)),
			'id_prodi' => htmlspecialchars($this->input->post('nama_prodi', true)),
			'foto' => $foto
		];

		$this->db->insert('mahasiswa', $data);
	}

}