<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khs extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Krs_model');
		cekMenu();
		cekLogin();
	}

	public function index()
	{
		// mengambil value name inputan di halaman khs/index
		$data = [
			'nim' => set_value('nim'),
			'id_tahun_aka' => set_value('id_tahun_aka')
		];
		$data['judul'] = 'KHS - Kartu Hasil Studi';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		// menampilkan table tahun_aka, menggunakan query concat
		$data['tahunakaseme'] = $this->Krs_model->getTahunAka();

		$this->form_validation->set_rules('nim', 'NIM', 'required|trim', ['required' => 'NIM Wajib Di Isi!']);
		$this->form_validation->set_rules('tahun_akad', 'Tahun Akademik', 'required|trim', ['required' => 'Tahun Akademik Wajib Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/khs/index', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->khs_aksi();
		}
	}

	public function khs_aksi()
	{
		$nim = $this->input->post('nim', true);
		$tahun_akad = $this->input->post('tahun_akad', true);

		if($this->Krs_model->getMhsId($nim) == null) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Data Mahasiswa <strong> Tidak Terdaftar!.</strong></div>');
			redirect('admin/khs');
		}

		$sql = $this->db->select('*')
					    ->from('krs')
					    ->join('matkul', 'matkul.kode_matkul = krs.kode_matkul')
					    ->where('krs.nim', $nim)
					    ->where('krs.id_tahun_aka', $tahun_akad)
					    ->get()->result();

		$smt = $this->db->select('tahun_aka, semester')
			 			->from('tahun_aka')
			 			->where(['id_tahun_aka' => $tahun_akad])->get()->row();

		$query_str = "SELECT mahasiswa.nim, mahasiswa.nama_lengkap, prodi.nama_prodi FROM mahasiswa INNER JOIN prodi ON (mahasiswa.id_prodi = prodi.id_prodi)";

		$mhs = $this->db->query($query_str)->row();

		if($smt->semester == 'Ganjil') {
			$tampilSemester = 'Ganjil';
		} else {
			$tampilSemester = 'Genap';
		}

		$data = [
			'mhs_data' => $sql,
			'mhs_nim' => $nim,
			'mhs_nama' => $mhs->nama_lengkap,
			'mhs_prodi' => $mhs->nama_prodi,
			'thn_akad' => $smt->tahun_aka . "(" . $tampilSemester . ")"
		];

		$data['judul'] = 'KHS - Kartu Hasil Studi';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/khs/khs', $data);
		$this->load->view('themeplates_admin/footer');


	}

}