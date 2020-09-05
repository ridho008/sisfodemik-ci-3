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
		// $datat = [
		// 		'nim' => set_value('nim'),
		// 		'id_tahun_aka' => set_value('id_tahun_aka')
		// ];
		$data['tahunakaseme'] = $this->Krs_model->getTahunAka();

		$this->form_validation->set_rules('nim', 'NIM', 'required|trim', ['required' => 'NIM Wajib Di Isi!']);
		$this->form_validation->set_rules('id_tahun_aka', 'Id Tahun Akademik', 'required|trim', ['required' => 'Id Tahun Akademik Wajib Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/krs/index', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->krs_aksi();

		}
	}

	public function krs_aksi()
	{
		// diambil dari inputan di halaman krs/index
		$nim = htmlspecialchars($this->input->post('nim', true));
		$tahun_akad = htmlspecialchars($this->input->post('tahun_akad'));
		
		// jika nim tidak ada di table Mahasiswa
		if($this->Krs_model->getMhsId($nim) == null) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Data NIM Mahasiswa <strong> '. set_value('nim') .' Tidak Terdaftar!.</strong></div>');
			redirect('admin/krs');
		}

		$data = [
			'nim' => $nim,
			'id_tahun_aka' => $tahun_akad,
			'nama_lengkap' => $this->Krs_model->getMhsId($nim)->nama_lengkap
		];

		// mempersiapkan data yang ingin ditampilkan di halaman krs_list, dengan menggunakan metode object
		$data = [
				'krs_data' => $this->bacaKrs($nim, $tahun_akad),
				'nim' => $nim,
				'id_tahun_aka' => $tahun_akad,
				'tahun_aka' => $this->Krs_model->getTahunAkaId($tahun_akad)->tahun_aka,
				'semester' => $this->Krs_model->getTahunAkaId($tahun_akad)->semester,
				'nama_lengkap' => $this->Krs_model->getMhsId($nim)->nama_lengkap,
				'prodi' => $this->Krs_model->getMhsId($nim)->nama_prodi
		];
		$data['judul'] = 'Kartu Rencana Studi';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/krs/krs_list', $data);
		$this->load->view('themeplates_admin/footer');
	}


	// menampilkan data di table (krs), di halaman krs_list
	public function bacaKrs($nim, $tahun_akad)
	{
		$this->db->select('krs.id_krs, krs.kode_matkul, matkul.nama_matkul, matkul.sks');
		$this->db->from('krs');
		$this->db->where('krs.nim', $nim);
		$this->db->where('krs.id_tahun_aka', $tahun_akad);
		$this->db->join('matkul', 'matkul.kode_matkul = krs.kode_matkul');
		return $this->db->get()->result();
	}


	public function tambah($nim, $tahun_akad)
	{
		
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		// menyiapkan seluruh data untuk proses tambah krs
		$data = [
				'id_krs' => set_value('id_krs'),
				'id_tahun_aka' => $tahun_akad,
				'thn_akad_smt' => $this->Krs_model->getTahunAkaId($tahun_akad)->tahun_aka,
				'semester' => $this->Krs_model->getTahunAkaId($tahun_akad)->semester,
				'nim' => $nim,
				'kode_matkul' => set_value('kode_matkul')
		];
		$data['matakuliah'] = $this->db->get('matkul')->result();
		$data['judul'] = 'Tambah Kartu Rencana Studi';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		$this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/krs/tambah_krs', $data);
		$this->load->view('themeplates_admin/footer');
	}

	public function tambah_aksi_krs()
	{
		$this->form_validation->set_rules('id_tahun_aka', 'Id Tahun Akademik', 'required|trim', ['required' => 'Id Tahun Akademik Wajib Di Isi!']);
		// $this->form_validation->set_rules('id_krs', 'Id KRS', 'required|trim', ['required' => 'Id KRS Wajib Di Isi!']);
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim', ['required' => 'NIM Wajib Di Isi!']);
		$this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required|trim', ['required' => 'Kode Mata Kuliah Wajib Di Isi!']);

		if($this->form_validation->run() == FALSE) {
			// mendapatkan parameter nim & id_tahun_aka melalui input di halaman (tambah_krs).
			$this->tambah($this->input->post('nim', true),
			$this->input->post('id_tahun_aka', true));
		} else {
			$nim = $this->input->post('nim', true);
			$id_tahun_aka = $this->input->post('id_tahun_aka', true);
			$kode_matkul = $this->input->post('kode_matkul', true);

			$data = [
					'id_tahun_aka' => $id_tahun_aka,
					'nim' => $nim,
					'kode_matkul' => $kode_matkul
			];

			$this->Krs_model->insert($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data KRS <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/krs');
		}
	}

	public function update($id)
	{
		$row = $this->Krs_model->getKrsId($id);
		$th = $row->id_tahun_aka;

		if($row) {
			$data = [
				'id_krs' => set_value('id_krs', $row->id_krs),
				'id_tahun_aka' => set_value('id_krs', $row->id_tahun_aka),
				'nim' => set_value('id_krs', $row->nim),
				'kode_matkul' => set_value('id_krs', $row->kode_matkul),
				'thn_akad_smt' => $this->Krs_model->getTahunAkaId($th)->tahun_aka,
				'semester' => $this->Krs_model->getTahunAkaId($th)->semester,
			];
			$data['judul'] = 'Update Kartu Rencana Studi';
			$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			$data['matakuliah'] = $this->db->get('matkul')->result();
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/krs/update_krs', $data);
			$this->load->view('themeplates_admin/footer');
		} else {
			echo "data tidak ada";
		}
	}

	public function update_aksi_krs()
	{
		$this->Krs_model->AksiUpdateKRS();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Data KRS <strong>Berhasil Diubah.</strong></div>');
		redirect('admin/krs');
	}

	public function hapus($id)
	{
		$this->db->delete('krs', ['id_krs' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-trash"></i> Data KRS <strong>Berhasil Dihapus.</strong></div>');
		redirect('admin/krs');
	}


}