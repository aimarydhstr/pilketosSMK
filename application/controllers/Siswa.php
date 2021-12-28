<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
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

		$data['title'] = 'Siswa Management';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/index', $data);
		$this->load->view('templates/footers', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function daftar($id_kelas)
	{	
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['id_kelas'] = $id_kelas;
		$this->db->order_by('nama_siswa','ASC');
		$data['siswa'] = $this->db->get_where('siswa', ['id_kelas' => $id_kelas])->result_array();
		$data['row'] = $this->db->get_where('siswa', ['id_kelas' => $id_kelas])->num_rows();
		$kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();

		$data['title'] = $kelas['kelas']." ".$kelas['jurusan'];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/daftar', $data);
		$this->load->view('templates/footers', $data);
		$this->load->view('templates/bawahan', $data);

	}

	public function add($id_kelas)
	{
		$data['title'] = 'Tambah Siswa';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['id_kelas'] = $id_kelas;
		$data['kelas'] = $this->db->get('kelas')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('siswa/add', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function save($id_kelas)
	{
		$id_kel = $this->input->post('id_kelas');
		$data = [
			'nis' => $this->input->post('nis'),
			'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'id_kelas' => $id_kel,
			'ikut' => $this->input->post('ikut')
		];

		$this->db->insert('siswa', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15">Siswa berhasil ditambahkan</div>');
		redirect('siswa/daftar/'.$id_kel);
	}

	public function delete($id_kelas, $nis)
	{
		$this->db->where('nis', $nis);
		$this->db->delete('siswa');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15">Berhasil menghapus siswa</div>');
		redirect('siswa/daftar/'.$id_kelas);
	}

	public function edit($nis)
	{
		$data['title'] = 'Edit Siswa';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['siswa'] = $this->db->get_where('siswa', ['nis' => $nis])->row_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('siswa/edit', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function update($id_kelas, $nis)
	{
		$id_kel = $this->input->post('id_kelas');
		$data = [
			'nis' => $this->input->post('nis'),
			'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'id_kelas' => $id_kel,
			'ikut' => $this->input->post('ikut')
		];

		$this->db->set($data);
		$this->db->where('nis', $nis);
		$this->db->update('siswa');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15">Berhasil memperbaharui siswa</div>');
		redirect('siswa/daftar/'.$id_kel);
	}

}
