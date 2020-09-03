<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Krs_model');
		cekMenu();
		cekLogin();
	}

	public function index()
	{
		$data['judul'] = 'KRS';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$datat = [
				'nim' => set_value('nim'),
				'id_tahun_aka' => set_value('id_tahun_aka')
		];
		$data['tahunakaseme'] = $this->Krs_model->getTahunAka();

		$this->form_validation->set_rules('nim', 'NIM', 'required|trim', ['required' => 'NIM Wajib Di Isi!']);
		$this->form_validation->set_rules('id_tahun_aka', 'Id Tahun Akademik', 'required|trim', ['required' => 'Id Tahun Akademik Wajib Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/krs/index', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$nim = htmlspecialchars($this->input->post('nim', true));
			$id_tahun_aka = htmlspecialchars($this->input->post('id_tahun_aka', true));
			
			// jika nim tidak ada di table Mahasiswa
			if($this->Krs_model->getMhsId($nim) == null) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Data Mahasiswa <strong> Tidak Terdaftar!.</strong></div>');
				redirect('admin/krs');
			}

			// Menit 7:27 List Video 16
		}
	}


}