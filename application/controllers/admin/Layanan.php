<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Layanan_model');
		cekMenu();
		cekLogin();
	}

	public function index()
	{
		$data['judul'] = 'Layanan';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		if($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword');
        } else if(!$this->input->post('submit')) {
            $data['keyword'] = $this->session->unset_userdata('keyword');
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('des_layanan', $data['keyword']);
        $this->db->or_like('judul_layanan', $data['keyword']);
        $this->db->from('layanan');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];

		// Pagination
		$config['base_url'] = 'http://localhost/sisfodemik-ci-3/admin/layanan/index/';
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
		$data['layanan'] = $this->Layanan_model->getAllLayanan($config['per_page'], $data['start'], $data['keyword']);

		$this->form_validation->set_rules('judul', 'Judul Layanan', 'required|trim',
		[
		'required' => 'Judul Layanan Harus Di Isi!'
		]
		);
		$this->form_validation->set_rules('des', 'Deskripsi Layanan', 'required|trim',
		[
		'required' => 'Deskripsi Layanan Harus Di Isi!'
		]
		);
		$this->form_validation->set_rules('icon', 'Icon Layanan', 'required|trim',
		[
		'required' => 'Icon Layanan Harus Di Isi!'
		]
		);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/layanan/index', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->Layanan_model->aksiTambahLayanan();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Layanan <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/layanan');
		}
	}

	public function getubahlayanan()
	{
		echo json_encode($this->Layanan_model->getUbahLayananById($_POST['id']));
	}

	public function ubahlayanan()
	{
		$this->Layanan_model->aksiUbahLayanan($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Layanan <strong>Berhasil Diubah.</strong></div>');
		redirect('admin/layanan');
	}

	public function hapus($id)
	{
		$this->db->delete('layanan', ['id_layanan' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-trash"></i> Data Layanan <strong>Berhasil Dihapus.</strong></div>');
		redirect('admin/layanan');
	}

}