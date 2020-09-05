<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {
	public function getAllJoinDosen($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('nama_dosen', $keyword);
			$this->db->like('telepon', $keyword);
			$this->db->like('email', $keyword);
			$this->db->like('alamat', $keyword);
		}
		return $this->db->get('dosen', $limit, $start)->result_array();
	}

	public function aksiTambahDosen()
	{
		$foto = $_FILES['foto']['name'];

		if($foto) {
			$config['allowed_types'] = 'png|jpg';
			$config['max_sizes'] = '2048';
			$config['upload_path'] = './assets/img/foto_dosen/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
			'nidn' => htmlspecialchars($this->input->post('nidn', true)),
			'nama_dosen' => htmlspecialchars($this->input->post('nama', true)),
			'alamat' => htmlspecialchars($this->input->post('alamat', true)),
			'kelamin' => htmlspecialchars($this->input->post('kelamin', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'telepon' => htmlspecialchars($this->input->post('telepon', true)),
			'foto_dosen' => $foto
		];

		$this->db->insert('dosen', $data);
	}

	public function getUbahDsn($id)
	{
		return $this->db->get_where('dosen', ['id_dosen' => $id])->row_array();
	}

	public function aksiUbahDosen($data)
	{
		$foto = $_FILES['foto']['name'];
		$id_dosen = $data['id_dosen'];
		if($foto) {
			$config['allowed_types'] = 'png|jpg';
			$config['max_sizes'] = '2048';
			$config['upload_path'] = './assets/img/foto_dosen/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$fotoLama = $data['fotoLama'];
				$result = $this->db->get_where('dosen', ['id_dosen' => $id_dosen])->row_array();
				$rowFoto = $result['foto_dosen'];

				if($fotoLama == $rowFoto) {
					unlink(FCPATH . 'assets/img/foto_dosen/' . $rowFoto);
				}

				$fotoBaru = $this->upload->data('file_name');
				$this->db->set('foto_dosen', $fotoBaru);
			} else {
				echo $this->upload->display_errors();
			}
		}
		// var_dump($data); die;
		$data = [
			'nidn' => $data['nidn'],
			'nama_dosen' => $data['nama'],
			'alamat' => $data['alamat'],
			'kelamin' => $data['kelamin'],
			'email' => $data['email'],
			'telepon' => $data['telepon']
		];

		$this->db->where('id_dosen', $id_dosen);
		$this->db->update('dosen', $data);
	}

}