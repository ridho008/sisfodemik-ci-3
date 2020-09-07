<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Halaman Tentang Kampus
class Tentang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tentang_model');
		cekMenu();
		cekLogin();
	}

	public function index()
	{
		$data['judul'] = 'Tentang Kampus';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['tentang'] = $this->Tentang_model->getAllTentangKampus();

		$this->form_validation->set_rules('sejarah', 'Sejarah', 'required|trim', ['required' => 'Sejarah Wajib Di Isi!']);
		$this->form_validation->set_rules('misi', 'Misi', 'required|trim', ['required' => 'Misi Wajib Di Isi!']);
		$this->form_validation->set_rules('visi', 'Visi', 'required|trim', ['required' => 'Visi Wajib Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/tentang/index', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->Tentang_model->aksiUbahTentang($_POST);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Tentang Kampus <strong>Berhasil Diubah.</strong></div>');
			redirect('admin/tentang');
		}
	}

	public function getubahtentang()
	{
		echo json_encode($this->Tentang_model->getTentangById($_POST['id']));
	}

}