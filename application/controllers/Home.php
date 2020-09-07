<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Identitas_model');
		$this->load->model('Tentang_model');
		$this->load->model('Informasi_model');
	}

	public function index()
	{
		$data['judul'] = 'Home';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['identitas'] = $this->Identitas_model->getAllIdentitasHome();

		// Tentang Kampus
		$data['tentang'] = $this->Tentang_model->getTentangKampusForHome();

		// Informasi Kampus
		$data['informasi'] = $this->Informasi_model->getInformasiKampusForHome();
		$this->load->view('themeplates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('themeplates/footer', $data);
	}


}