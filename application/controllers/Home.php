<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Identitas_model');
		$this->load->model('Tentang_model');
		$this->load->model('Informasi_model');
		$this->load->model('Hubungi_model');
		$this->load->model('Layanan_model');
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

		// Layanan Kampus
		$data['layanan'] = $this->Layanan_model->getInformasiLayananForHome();
		$this->load->view('themeplates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('themeplates/footer', $data);
	}

	public function hubungi()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'Nama Lengkap Wajib Di Isi!']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email Wajib Di Isi!']);
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', ['required' => 'Pesan Wajib Di Isi!']);
        if($this->form_validation->run() == FALSE) {
        	$this->index();
        } else {
        	$this->Hubungi_model->aksiTambahPesan();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Pesan <strong>Berhasil Dikirim.</strong></div>');
			redirect('home');
        }
    }


}