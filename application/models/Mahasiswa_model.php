<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {
	public function getAllJoinMahasiswaProdi($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('nama_lengkap', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('telepon', $keyword);
			$this->db->or_like('alamat', $keyword);
		}
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi');
		return $this->db->get('', $limit, $start)->result_array();
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

	public function getMahasiswaId($id)
	{
		return $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->row_array();
	}

	public function aksiUbahMhs($data)
	{
		$foto = $_FILES['foto']['name'];
		$id_mahasiswa = $data['id_mahasiswa'];
		if($foto) {
			$config['allowed_types'] = 'png|jpg';
			$config['max_sizes'] = '2048';
			$config['upload_path'] = './assets/img/foto_mahasiswa/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$fotoLama = $data['fotoLama'];
				$result = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id_mahasiswa])->row_array();
				$rowFoto = $result['foto'];

				if($fotoLama == $rowFoto) {
					unlink(FCPATH . 'assets/img/foto_mahasiswa/' . $rowFoto);
				}

				$fotoBaru = $this->upload->data('file_name');
				$this->db->set('foto', $fotoBaru);
			} else {
				echo $this->upload->display_errors();
			}
		}
		// var_dump($data); die;
		$data = [
			'nim' => $data['nim'],
			'nama_lengkap' => $data['nama'],
			'alamat' => $data['alamat'],
			'email' => $data['email'],
			'telepon' => $data['telepon'],
			'tmp_lahir' => $data['tmp_lahir'],
			'tgl_lahir' => $data['tgl_lahir'],
			'kelamin' => $data['kelamin'],
			'id_prodi' => $data['nama_prodi']
		];

		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->update('mahasiswa', $data);
	}

}