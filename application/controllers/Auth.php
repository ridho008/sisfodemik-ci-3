<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$data['judul'] = 'Halaman Login';

		$this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username Harus Di isi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password Harus Di isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		// var_dump($user); die;

		if($user != null) {
			if(password_verify($password, $user['password'])) {
				$data = [
					'id_user' => $user['id_user'],
					'username' => $user['username'],
					'email' => $user['email'],
					'level' => $user['level'],
				];
				$this->session->set_userdata($data);

				if($user['level'] == 'user') {
					redirect('admin/dashboard');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Password Anda Salah!.</strong></div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Anda Belum Terdatar <strong>silahkan, daftar dulu.</strong></div>');
			redirect('auth');
		}
	}

	public function daftar()
	{
		$data['judul'] = 'Halaman Daftar';

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email Harus Di isi!', 'valid_email' => 'Email harus valid/benar!']);
		$this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username Harus Di isi!']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password1]|min_length[3]', 
		[
		'required' => 'Password Harus Di isi!',
		'min_length' => 'Panjang Password Minimal 3 Huruf',
		'matches' => 'Konfirmasi Password Salah!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]', 
		[
		'required' => 'Konfirmasi Password Harus Di isi!'

		]);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('auth/daftar', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->Auth_model->aksiTambahUser();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Akun Berhasil <strong>Didaftarkan.</strong></div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Berhasil Logout</div>');
		redirect('auth');
	}

}