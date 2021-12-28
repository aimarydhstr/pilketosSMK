<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller
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
		$this->db->order_by('kelas ASC');$this->db->order_by('jurusan ASC');
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['row'] = $this->db->get('kelas')->num_rows();

		$data['title'] = 'Kelas Management';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kelas/index', $data);
		$this->load->view('templates/footers', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Kelas';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kelas/add', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		} 
	}

	public function save()
	{
		$data = [
			'kelas' => $this->input->post('kelas'),
			'jurusan' => $this->input->post('jurusan'),
			'is_active' => 0, 
			'token' => $this->input->post('token')
		];

		$this->db->insert('kelas', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Kelas berhasil ditambahkan</div>');
		redirect('kelas');
	}

	public function delete($id_kelas)
	{
		$this->db->where('id_kelas', $id_kelas);
		$this->db->delete('kelas');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Berhasil menghapus kelas</div>');
		redirect('kelas');
	}

	public function edit($id_kelas)
	{
		$data['title'] = 'Edit Kelas';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kelas/edit', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function update($id_kelas)
	{
		$data = [
			'kelas' => $this->input->post('kelas'),
			'jurusan' => $this->input->post('jurusan'),
			'is_active' => $this->input->post('is_active'),
			'token' => $this->input->post('token')
		];

		$this->db->set($data);
		$this->db->where('id_kelas', $id_kelas);
		$this->db->update('kelas');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Berhasil memperbaharui kelas</div>');
		redirect('kelas');
	}

	public function active($id_kelas, $is_active)
	{
		$is_active = $is_active + 1;

		$this->db->set('is_active', $is_active);
		$this->db->where('id_kelas', $id_kelas);
		$this->db->update('kelas');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Berhasil memperbaharui sesi</div>');
		redirect('kelas');
	}

}
