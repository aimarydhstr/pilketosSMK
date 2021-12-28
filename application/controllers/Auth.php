<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{	

		$data['meta'] = $this->db->get('meta')->row_array();

		if ($this->session->userdata('nis')){
			redirect('pemilihan');
		}
		if ($this->session->userdata('username') && $this->session->userdata('id_role')==1){
			redirect('dashboard');
		}
		if ($this->session->userdata('username') && $this->session->userdata('id_role')==2){
			redirect('data');
		}		

		$this->form_validation->set_rules('nis', 'NIS', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('token', 'Token', 'required|trim');

		if($this->form_validation->run() == false){

		$data['title'] = 'Login Peserta';
		$this->load->view('templates/header', $data);
		$this->load->view('auth/index', $data);
		$this->load->view('templates/bawahan', $data);

		}

		else {

			$this->_logins();
		
		}
	}

	private function _logins()
	{
		$nis = $this->input->post('nis');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$token = $this->input->post('token');

		$akun = $this->db->get_where('siswa', ['nis' => $nis])->row_array();
		$jml = $this->db->get_where('siswa', ['nis' => $nis])->num_rows();

		$kls = $this->db->get_where('kelas', ['id_kelas' => $akun['id_kelas']])->row_array();
		
		if($jml == 1) {
			if ($nis == $akun['nis']) {
				if ($tgl_lahir == $akun['tgl_lahir']) {	
					if($token == $kls['token']){
						if ($akun['ikut'] == 1 || $akun['ikut'] == 2) {
							$data = [
								'nis' => $akun['nis'],
								'tgl_lahir' => $akun['tgl_lahir'],
								'token' => $akun['token'],
								'id_kelas' => $akun['id_kelas']
							];
				
							$this->session->set_userdata($data);
				
							if ($this->session->userdata('nis')){
								redirect('pemilihan');
							} else{}
						} else {
							$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf anda tidak boleh memilih!</div>');
							redirect('auth');
						}
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger">Token Salah</div>');
							redirect('auth');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Tanggal Lahir Salah!</div>');
					redirect('auth');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">NIS Salah</div>');
				redirect('auth');
			}

		} else if($jml == 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Siswa Tidak Terdaftar!</div>');
			redirect('auth');
		}
	}

	public function login()
	{	

		$data['meta'] = $this->db->get('meta')->row_array();

		if ($this->session->userdata('nis')){
			redirect('pemilihan');
		}
		if ($this->session->userdata('username') && $this->session->userdata('id_role')==1){
			redirect('dashboard');
		}
		if ($this->session->userdata('username') && $this->session->userdata('id_role')==2){
			redirect('data');
		}

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){

		$data['title'] = 'Login Admin';
		$this->load->view('templates/header', $data);
		$this->load->view('auth/login', $data);
		$this->load->view('templates/bawahan', $data);

		}

		else {

			$this->_login();
		
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$account = $this->db->get_where('akun', ['username' => $username])->row_array();
		
		if($account) {
			if($account['status'] == 1){	
				if (password_verify($password, $account['password'])) {
					$data = [
						'username' => $account['username'],
						'id_role' => $account['id_role']
					];
					$this->session->set_userdata($data);
	
					if ($account['id_role'] == 1) {
						redirect('dashboard');
					} else {
						redirect('data');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Password Salah!</div>');
					redirect('auth/login');
				}

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Akun Belum Aktif</div>');
				redirect('auth/login');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Akun Belum Terdaftar</div>');
			redirect('auth/login');
		}
	}	

	public function logout()
	{
		$vote = $this->db->get_where('vote', ['nis' => $this->session->userdata('nis')])->row_array();

		$this->load->model('Vote_model', 'vote');
		$sesi = $this->db->get_where('kelas', ['id_kelas' => $this->session->userdata('id_kelas')])->row_array();

		if ($vote['done'] == 1 && $sesi['is_active'] == 1){			

			if ($this->session->flashdata('message')) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Terima kasih sudah memilih</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf anda sudah memilih</div>');
			}
		} else if ($vote['done'] == 0 && $sesi['is_active'] == 0){			
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf sesi belum dimulai</div>');
		} else if ($vote['done'] == 0 && $sesi['is_active'] == 2){			
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf sesi sudah selesai</div>');
		} else if ($vote['done'] == 1 && $sesi['is_active'] == 2){			
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf sesi sudah selesai</div>');
		} else if ($vote['done'] == 0 || !$this->session->flashdata('message')) {
			$this->session->set_flashdata('message', '<div class="alert alert-orange">Selamat Anda Berhasil Logout!</div>');
		}

		$this->session->unset_userdata('nis');
		$this->session->unset_userdata('tgl_lahir');
		$this->session->unset_userdata('token');

		redirect('auth');

	}

	public function logouts()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');

		$this->session->set_flashdata('message', '<div class="alert alert-orange">Selamat Anda Berhasil Logout!</div>');
		redirect('auth/login');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}

}
