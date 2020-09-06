<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function getALlUser($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('username', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('level', $keyword);
		}
		return $this->db->get('user', $limit, $start)->result_array();
	}

	public function aksiTambahUsers()
	{
		$data = [
			'username' => htmlspecialchars($this->input->post('username', true)),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'level' => htmlspecialchars($this->input->post('level', true)),
			'blokir' => htmlspecialchars($this->input->post('blokir', true)),
			'id_session' => '1'
		];

		$this->db->insert('user', $data);
	}

	public function getUserById($id)
	{
		return $this->db->get_where('user', ['id_user' => $id])->row_array();
	}

	public function aksiUbahUser($data)
	{
		$id_user = $data['id_user'];

		$arr = [
			'username' => htmlspecialchars($data['username']),
			'password' => password_hash($data['password'], PASSWORD_DEFAULT),
			'email' => htmlspecialchars($data['email']),
			'level' => htmlspecialchars($data['level']),
			'blokir' => htmlspecialchars($data['blokir'])
		];

		$this->db->set($arr);
		$this->db->where('id_user', $id_user);
		$this->db->update('user');
	}

}