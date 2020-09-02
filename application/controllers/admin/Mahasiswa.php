<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		if(!$this->session->userdata('level')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['mahasiswa'] = $this->Mahasiswa_model->getAllJoinMahasiswaProdi();
		$data['prodi'] = $this->db->get('prodi')->result_array();

		$this->form_validation->set_rules('nim', 'NIM', 'required|trim', ['required' => 'NIM Harus Di Isi!']);
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'Nama Lengkap Harus Di Isi!']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email Harus Di Isi!']);
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim', ['required' => 'Tempat Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', ['required' => 'Tanggal Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis Kelamin Harus Di Isi!']);
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim', ['required' => 'Telepon Harus Di Isi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Harus Di Isi!']);
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim', ['required' => 'Nama Prodi Harus Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/mahasiswa/index', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->Mahasiswa_model->aksiTambahMahasiswa();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Mahasiswa <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/mahasiswa');
		}
	}

}