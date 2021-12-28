<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Navigasi extends CI_Controller
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
		$this->db->order_by('nav_name', 'ASC');
		$data['nav'] = $this->db->get('navigasi')->result_array();
		$data['row'] = $this->db->get('navigasi')->num_rows();

		$data['title'] = 'Navigasi Management';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('navigasi/index', $data);
		$this->load->view('templates/footers', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Navigasi';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['nav'] = $this->db->get('navigasi')->result_array();
		$data['row'] = $this->db->get('navigasi')->num_rows();
		$data['menu'] = $this->db->get('menu')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('navigasi/add', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		} 
	}

	public function save()
	{
		$data = [
			'nav_name' => $this->input->post('nav_name'),
			'nav_link' => $this->input->post('nav_link'),
			'nav_icon' => $this->input->post('nav_icon'),
			'subnav' => $this->input->post('subnav'),
			'id_menu' => $this->input->post('id_menu')
		];

		$this->db->insert('navigasi', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Navigasi berhasil ditambahkan</div>');
		redirect('navigasi');
	}

	public function delete($nav_id)
	{
		$this->db->where('nav_id', $nav_id);
		$this->db->delete('navigasi');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Berhasil menghapus navigasi</div>');
		redirect('navigasi');
	}

	public function edit($nav_id)
	{
		$data['title'] = 'Edit Navigasi';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['nav'] = $this->db->get_where('navigasi', ['nav_id' => $nav_id])->row_array();
		$data['menu'] = $this->db->get('menu')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('navigasi/edit', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function update($nav_id)
	{
		$data = [
			'nav_name' => $this->input->post('nav_name'),
			'nav_link' => $this->input->post('nav_link'),
			'nav_icon' => $this->input->post('nav_icon'),
			'subnav' => $this->input->post('subnav'),
			'id_menu' => $this->input->post('id_menu')
		];

		$this->db->set($data);
		$this->db->where('nav_id', $nav_id);
		$this->db->update('navigasi');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Berhasil memperbaharui navigasi</div>');
		redirect('navigasi');
	}

}
