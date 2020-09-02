<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurusan_model');
		if(!$this->session->userdata('level')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Jurusan';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$this->db->order_by('id_jurusan', 'DESC');
		$data['jurusan'] = $this->db->get('jurusan')->result_array();

		$this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required|trim',
		[
		'required' => 'Kode Jurusan Harus Di Isi!'
		]
		);
		$this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required|trim',
		[
		'required' => 'Nama Jurusan Harus Di Isi!'
		]
		);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/jurusan/index', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->Jurusan_model->aksiTambahJurusan();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Jurusan <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/jurusan');
		}
	}

	public function getubahjurusan()
	{
		// echo $_POST['id'];
		echo json_encode($this->Jurusan_model->getJurusanId($_POST['id']));
	}

	public function ubahjurusan()
	{
		$this->Jurusan_model->aksiUbahJurusan($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Jurusan <strong>Berhasil Diubah.</strong></div>');
		redirect('admin/jurusan');
	}

	public function hapus($id)
	{
		$this->db->delete('jurusan', ['id_jurusan' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Jurusan <strong>Berhasil Dihapus.</strong></div>');
		redirect('admin/jurusan');
	}

}