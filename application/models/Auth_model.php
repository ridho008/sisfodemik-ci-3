<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	public function aksiTambahUser()
	{
		$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'level' => 'user',
				'blokir' => 'N',
				'id_session' => '1',
		];

		$this->db->insert('user', $data);
	}

}