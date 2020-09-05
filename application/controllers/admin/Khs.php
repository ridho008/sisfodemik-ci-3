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
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Data NIM Mahasiswa <strong>'. set_value('nim') .' Tidak Terdaftar!.</strong></div>');
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


	// ------------- INPUT NILAI-----------------
	public function input_nilai()
	{
		$data = [
			'kode_matkul' => set_value('kode_matkul'),
			'id_tahun_aka' => set_value('id_tahun_aka')
		];

		$data['judul'] = 'Input Nilai';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['tahunakaseme'] = $this->Krs_model->getTahunAka();

		
		$this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/khs/inputnilai_form', $data);
		$this->load->view('themeplates_admin/footer');
		
	}


	public function inputnilai_aksi()
	{
		$this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required|trim', ['required' => 'Kode Mata Kuliah Wajib Di Isi!']);
		$this->form_validation->set_rules('id_tahun_aka', 'Tahun Akademik', 'required|trim', ['required' => 'Tahun Akademik Wajib Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->input_nilai();
		} else {
			$kode_matkul = $this->input->post('kode_matkul', true);
			$id_tahun_aka = $this->input->post('id_tahun_aka', true);

			$query = $this->Krs_model->aksiQueryInputNilai($kode_matkul, $id_tahun_aka);

			if($this->Krs_model->getKodeMatkulById($kode_matkul) == null) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Data Kode Mata Kuliah <strong>' . set_value('kode_matkul') . ' ' . ' Tidak Terdaftar!.</strong></div>');
				redirect('admin/khs/input_nilai');
			}

			$data = [
					'list_nilai' => $query,
					'kode_matkul' => $kode_matkul,
					'id_tahun_aka' => $id_tahun_aka
			];

			$data['judul'] = 'Masukan Nilai Akhir';
			$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			// mengambil nama matkul di DB (matkul)
			$data['matkul'] = $this->Krs_model->getMatkulByKodeMatkul($kode_matkul);
			$data['tahun_aka'] = $this->Krs_model->getTahunAkaId($id_tahun_aka);
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/khs/nilai_form', $data);
			$this->load->view('themeplates_admin/footer');

		}
	}

	public function simpan_nilai($kode_matkul)
	{
		$query = [];
		$id_krs = $this->input->post('id_krs');
		$nilai = $this->input->post('nilai');

		for($i = 0; $i < count($id_krs); $i++) {
			$this->db->set('nilai', $nilai[$i]);
			$this->db->where('id_krs', $id_krs[$i]);
			$this->db->update('krs');
		}

		$data = [
			'id_krs' => $id_krs
		];

		$data['judul'] = 'Daftar Nilai Mahasiswa';
			$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['krs'] = $this->Krs_model->getKrsByIdArr($id_krs[0]);
		$data['krsall'] = $this->Krs_model->getKrsByMatkulArr($kode_matkul);
		$this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/khs/daftar_nilai', $data);
		$this->load->view('themeplates_admin/footer');
	}

}