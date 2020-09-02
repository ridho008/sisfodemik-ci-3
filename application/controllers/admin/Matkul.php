<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Matkul_model');
		if(!$this->session->userdata('level')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Mata Kuliah';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		// Pagination
		if($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword');
        } else if(!$this->input->post('submit')) {
            $data['keyword'] = $this->session->unset_userdata('keyword');
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('kode_matkul', $data['keyword']);
        $this->db->or_like('nama_matkul', $data['keyword']);
        $this->db->from('matkul');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];

		// Pagination
		$config['base_url'] = 'http://localhost/sisfodemik-ci-3/admin/matkul/index/';
		// $config['total_rows'] = $this->Prodi_model->countAllProdi();
		// var_dump($config['total_rows']); die;
		$config['per_page'] = 2;

		// Style
		$config['full_tag_open'] = '<nav class="d-inline-block"><ul class="pagination mb-0">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		
		$data['start'] = $this->uri->segment(4);

		$data['prodi'] = $this->db->get('prodi')->result_array();
		$data['matkul'] = $this->Matkul_model->getMatkulProdi($config['per_page'], $data['start'], $data['keyword']);
		$kodeMatkul = $this->Matkul_model->cekKodeMatkul();
		$noUrut = substr($kodeMatkul, 3, 4);
		$kodeMarkulSekarang = $noUrut + 1;
		$data['kode'] = $kodeMarkulSekarang;

		$this->form_validation->set_rules('kode_matkul', 'Kode Matkul', 'required|trim',
		[
		'required' => 'Kode Matkul Harus Di Isi!'
		]
		);
		$this->form_validation->set_rules('nama_matkul', 'Nama Matkul', 'required|trim',
		[
		'required' => 'Nama Matkul Harus Di Isi!'
		]
		);
		$this->form_validation->set_rules('sks', 'SKS', 'required|trim',
		[
		'required' => 'SKS Harus Di Isi!'
		]
		);
		$this->form_validation->set_rules('semester', 'Semester', 'required|trim',
		[
		'required' => 'Semester Harus Di Isi!'
		]
		);
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim',
		[
		'required' => 'Nama Prodi Harus Di Isi!'
		]
		);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/matkul/index', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->Matkul_model->aksiTambahMatkul();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Mata Kuliah <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/matkul');
		}
	}

	public function getdetailmatkul()
	{
		$kode = $_POST['id'];
		echo json_encode($this->Matkul_model->getDetailJoinProdi($kode));
	}

	public function getubahmatkul()
	{
		$kode = $_POST['id'];
		echo json_encode($this->Matkul_model->getMatkulId($kode));
	}

	public function ubahmatkul()
	{
		$this->Matkul_model->aksiUbahMatkul($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Mata Kuliah <strong>Berhasil Diubah.</strong></div>');
		redirect('admin/matkul');
	}

	public function hapus($id)
	{
		$this->db->delete('matkul', ['kode_matkul' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-trash"></i> Data Mata Kuliah <strong>Berhasil Dihapus.</strong></div>');
		redirect('admin/matkul');
	}

}