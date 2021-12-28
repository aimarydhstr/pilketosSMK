<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$ci = get_instance();
		
		if($ci->session->userdata('nis') || !$ci->session->userdata('username') || $ci->session->userdata('id_role') == 2) {
			redirect('auth/login');
		} 
	}

	public function index()
	{	

		$data['meta'] = $this->db->get('meta')->row_array();
		$data['ikut'] = $this->db->get_where('siswa', ['ikut !=' => 0])->num_rows();
		$data['tidak'] = $this->db->get_where('siswa', ['ikut' => 0])->num_rows();
		$data['vote'] = $this->db->get('vote')->num_rows();

		$this->load->model('Vote_model', 'vote');
		$data['kandidat'] = $this->vote->a();
		$data['row'] = $this->vote->row();

		$this->db->order_by('kelas ASC');$this->db->order_by('jurusan ASC');
		$data['kelas'] = $this->db->get('kelas')->result_array();

		if($this->form_validation->run() == false){

		$data['title'] = 'Dashboard';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footers', $data);
		$this->load->view('templates/bawahan', $data);

		}

	}
}
