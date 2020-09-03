<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		// if(!$this->session->userdata('level')) {
		// 	redirect('auth');
		// }
	}

	public function index()
	{
		$data['judul'] = 'User';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('themeplates_admin/footer');
	}

}