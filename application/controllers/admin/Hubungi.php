<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Halaman Hubungi Kami
class Hubungi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hubungi_model');
		cekMenu();
		cekLogin();
	}

	public function index()
	{
		$data['judul'] = 'Hubungi Kami';
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

        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->from('hubungi');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];

		// Pagination
		$config['base_url'] = 'http://localhost/sisfodemik-ci-3/admin/hubungi/index/';
		// $config['total_rows'] = $this->Prodi_model->countAllProdi();
		// var_dump($config['total_rows']); die;
		$config['per_page'] = 3;

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

		$data['hubungi'] = $this->Hubungi_model->getAllHubungi($config['per_page'], $data['start'], $data['keyword']);

        $this->form_validation->set_rules('id_hubungi', 'Id Hubungi', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email Wajib Di Isi!']);
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim', ['required' => 'Subject Wajib Di Isi!']);
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', ['required' => 'Pesan Wajib Di Isi!']);
        if($this->form_validation->run() == FALSE) {
    		$this->load->view('themeplates_admin/header', $data);
    		$this->load->view('themeplates_admin/sidebar', $data);
    		$this->load->view('admin/hubungi/index', $data);
    		$this->load->view('themeplates_admin/footer');
        } else {
            $this->_kirim_email_aksi();
        }
	}

    public function _kirim_email_aksi()
    {
        $id_hubungi = $this->input->post('id_hubungi');
        $untukEmail = $this->input->post('email');
        $judulPesan = $this->input->post('subject');
        $pesan = $this->input->post('pesan');
        $config = [
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'ridhosurya71@gmail.com',
                'smtp_pass' => 'warning008',
                'smtp_port' => 465,
                'crlf' => "\r\n",
                'newline' => "\r\n"
        ];

        $this->email->initialize($config);
        // Pengirim Admin
        $this->email->from('STMIK AMIK RIAU (SAR)');
        $this->email->to($untukEmail);

        $this->email->subject($judulPesan);
        $this->email->message($pesan);

        if($this->email->send()) {
            // Update field status
            $this->db->set('status', '1');
            $this->db->where('id_hubungi', $id_hubungi);
            $this->db->update('hubungi');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-info-circle"></i> Pesan <strong>Berhasil Dikirim kepada '. $untukEmail .'.</strong></div>');
            redirect('admin/hubungi');
        } else {
            // Jika gagal mengirim pesan
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Pesan <strong>Gagal Dikirim kepada '. $untukEmail .'.</strong></div>');
            redirect('admin/hubungi');
        }
    }

    public function getpesanuser()
    {
        echo json_encode($this->Hubungi_model->getPesanUserById($_POST['id']));
    }

    public function hapus($id)
    {
        $this->db->delete('hubungi', ['id_hubungi' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-trash"></i> Pesan <strong>Berhasil Dihapus.</strong></div>');
        redirect('admin/hubungi');
    }


}