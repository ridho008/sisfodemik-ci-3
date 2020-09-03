<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cekMenu();
		cekLogin();
		$this->load->model('Mahasiswa_model');
		// if(!$this->session->userdata('level')) {
		// 	redirect('auth');
		// }
	}

	public function index()
	{
		$data['judul'] = 'Mahasiswa';
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

        $this->db->like('nama_lengkap', $data['keyword']);
        $this->db->or_like('alamat', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->or_like('telepon', $data['keyword']);
        $this->db->from('mahasiswa');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];

		// Pagination
		$config['base_url'] = 'http://localhost/sisfodemik-ci-3/admin/mahasiswa/index/';
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

		$data['mahasiswa'] = $this->Mahasiswa_model->getAllJoinMahasiswaProdi($config['per_page'], $data['start'], $data['keyword']);
		$data['prodi'] = $this->db->get('prodi')->result_array();

		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|alpha_numeric_spaces|alpha_numeric', ['required' => 'NIM Harus Di Isi!', 'alpha_numeric_spaces' => 'NIM Tidak Boleh Berisi Spasi!']);
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

	public function getubahmhs()
	{
		echo json_encode($this->Mahasiswa_model->getMahasiswaId($_POST['id']));
	}

	public function ubahmhs()
	{
		$this->Mahasiswa_model->aksiUbahMhs($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data Mahasiswa <strong>Berhasil Diubah.</strong></div>');
		redirect('admin/mahasiswa');
	}

	public function hapus($id)
	{
		$result = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->row_array();
		$rowFoto = $result['foto'];
		unlink('./assets/img/foto_mahasiswa/' . $rowFoto);
		$this->db->where('id_mahasiswa', $id);
		$this->db->delete('mahasiswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-trash"></i> Data Mahasiswa <strong>Berhasil Dihapus.</strong></div>');
		redirect('admin/mahasiswa');
	}

}