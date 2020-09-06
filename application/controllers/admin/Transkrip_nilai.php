<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transkrip_nilai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transkrip_nilai_model');
		cekMenu();
		cekLogin();
	}

	public function index()
	{
		$data['judul'] = 'Transkrip Nilai';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/transkrip_nilai/index', $data);
		$this->load->view('themeplates_admin/footer');
	}

	public function transkrip_aksi()
	{
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim', ['required' => 'NIM Wajib Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$nim = htmlspecialchars($this->input->post('nim', true));

			$this->db->select('*');
			$this->db->from('krs');
			$this->db->where('nim', $nim);
			$query = $this->db->get();

			foreach($query->result() as $value) {
				cekNilai($value->nim, $value->kode_matkul, $value->nilai);
			}
			$data['krsnim'] = $this->Transkrip_nilai_model->getKrsByNim();
			$data['transkrip'] = $this->Transkrip_nilai_model->getTranskripByNim();
			$data['mhs'] = $this->Transkrip_nilai_model->getMhsByNim();

			$data['judul'] = 'Daftar Transkrip Nilai';
			$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/transkrip_nilai/data_transkrip', $data);
			$this->load->view('themeplates_admin/footer');
		}
	}

}