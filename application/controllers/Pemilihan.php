<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilihan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		
		$ci = get_instance();
		
		if(!$ci->session->userdata('nis') || $ci->session->userdata('username')) {
			redirect('auth');
		} 
	}

	public function index()
	{	

		$data['meta'] = $this->db->get('meta')->row_array();
		$data['user'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
		$siswa = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();

		$vote = $this->db->get_where('vote', ['nis' => $this->session->userdata('nis')])->row_array();
		
		$this->load->model('Vote_model', 'vote');
		$sesi = $this->db->get_where('kelas', ['id_kelas' => $this->session->userdata('id_kelas')])->row_array();

		if ($vote['done'] == 1) {
			redirect('auth/logout/');
		}
		if ($sesi['is_active'] == 0) {
			redirect('auth/logout/');
		}
		if ($sesi['is_active'] == 2) {
			redirect('auth/logout/');
		}

		$data['calon'] = $this->vote->a();

		$data['title'] = 'Vote Kandidat';
		$this->load->view('templates/headers', $data);
		$this->load->view('pemilihan/index', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/bawah', $data);
		
	}

	public function vote($no)
	{

		$vote = $this->db->get_where('vote', ['nis' => $this->session->userdata('nis')])->row_array();

		$this->load->model('Vote_model', 'vote');
		$sesi = $this->db->get_where('kelas', ['id_kelas' => $this->session->userdata('id_kelas')])->row_array();

		if ($vote['done'] == 1) {
			redirect('auth/logout/');
		}
		if ($sesi['is_active'] == 0) {
			redirect('auth/logout/');
		}
		if ($sesi['is_active'] == 2) {
			redirect('auth/logout/');
		}

		$user = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();

		$data = [
			'nis' => $user['nis'],
			'id_kelas' => $user['id_kelas'],
			'id_calon' => $no,
			'done' => 1
		];

		$this->db->insert('vote', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Terima kasih sudah memilih kandidat ketua OSIS</div>');
		redirect('auth/logout');
	}

}