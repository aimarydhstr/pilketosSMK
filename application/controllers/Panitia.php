<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller
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
		$this->load->model('Vote_model', 'vote');

		$data['panitia'] = $this->vote->b();
		$data['row'] = $this->vote->rows();

		$data['title'] = 'Panitia Management';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('panitia/index', $data);
		$this->load->view('templates/footers', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Panitia';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['siswa'] = $this->db->get_where('siswa', ['ikut' => 2])->result_array();

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[akun.username]', ['is_unique' => 'Username Sudah Terpakai']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
			'matches' => 'Password Tidak Cocok',
			'min_length' => 'Password Terlalu Pendek'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('panitia/add', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function save()
	{
		$siswa = $this->db->get_where('siswa', ['nis' => $this->input->post('nis')])->row_array();
		$id_kelas = $siswa['id_kelas'];

		$upload_image = $_FILES['profil']['name'];

		if($upload_image) {
			$config['upload_path']		 = './assets/img/';
			$config['allowed_types'] 	 = 'gif|jpg|png|jpeg|tiff';
			$config['max_size']   		 = '2048';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('profil')) {

				$new_image = $this->upload->data('file_name');

			} else {
				echo $this->upload->display_errors();
			}

			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT),
				'profil' => $this->upload->data('file_name'),
				'nis' => $this->input->post('nis'),
				'id_kelas' => $id_kelas,
				'id_role' => $this->input->post('role'),
				'status' => $this->input->post('status')
			];

		} else {
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'nis' => $this->input->post('nis'),
				'id_kelas' => $id_kelas,
				'id_role' => $this->input->post('role'),
				'status' => $this->input->post('status')
			];
		}

		$this->db->insert('akun', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15">Panitia berhasil ditambahkan</div>');
		redirect('panitia');
	}

	public function delete($username)
	{
		$this->db->where('username', $username);
		$this->db->delete('akun');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15">Berhasil menghapus panitia</div>');
		redirect('panitia');
	}

	public function edit($username)
	{
		$data['title'] = 'Edit Panitia';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['siswa'] = $this->db->get_where('siswa', ['ikut' => 2])->result_array();
		$data['akun'] = $this->db->get_where('akun', ['username' => $username])->row_array();

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[akun.username]', ['is_unique' => 'Username Sudah Terpakai']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
			'matches' => 'Password Tidak Cocok',
			'min_length' => 'Password Terlalu Pendek'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('panitia/edit', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function update($username)
	{
		$siswa = $this->db->get_where('siswa', ['nis' => $this->input->post('nis')])->row_array();
		$id_kelas = $siswa['id_kelas'];
		$upload_image = $_FILES['profil']['name'];

		if($upload_image) {
			$config['upload_path']		 = './assets/img/';
			$config['allowed_types'] 	 = 'gif|jpg|png|jpeg|tiff';
			$config['max_size']   		 = '2048';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('profil')) {

				$old_image = $data['akun']['profil'];
				
				if ($old_image != 'noimage.png') {
					unlink(FCPATH.'assets/img/'.$old_image);
				}

				$new_image = $this->upload->data('file_name');
				$this->db->set('profil', $new_image);

			} else {
				echo $this->upload->display_errors();
			}
		} 

		$data = [
			'username' => htmlspecialchars($this->input->post('username', true)),
			'nis' => $this->input->post('nis'),
			'id_kelas' => $id_kelas,
			'id_role' => $this->input->post('role'),
			'status' => $this->input->post('status')
		];
		
		$this->db->set($data);
		$this->db->where('username', $username);
		$this->db->update('akun');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15">Berhasil memperbaharui panitia</div>');
		redirect('panitia');
	}

}
