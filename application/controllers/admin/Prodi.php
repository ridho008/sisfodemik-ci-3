<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Prodi_model');
		if(!$this->session->userdata('level')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Program Studi';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['prodi'] = $this->Prodi_model->getAllProdiJoinJurusan();
		$data['jurusan'] = $this->db->get('jurusan')->result_array();
		$this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'required|trim',
		[
		'required' => 'Kode Prodi Harus Di Isi!'
		]
		);
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim',
		[
		'required' => 'Nama Prodi Harus Di Isi!'
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
			$this->load->view('admin/prodi/index', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->Prodi_model->aksiProdiJurusan();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Program Studi <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/prodi');
		}
	}

	public function getubahprodi()
	{
		// echo $_POST['id'];
		echo json_encode($this->Prodi_model->getProdiId($_POST['id']));
	}

	public function ubahprodi()
	{
		$this->Prodi_model->aksiUbahProdi($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Program Studi <strong>Berhasil Diubah.</strong></div>');
		redirect('admin/prodi');
	}

	public function hapus($id)
	{
		$this->db->delete('prodi', ['id_prodi' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Program Studi <strong>Berhasil Dihapus.</strong></div>');
		redirect('admin/prodi');
	}

}