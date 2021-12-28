<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subnav extends CI_Controller
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
		$this->db->order_by('sub_nav_name', 'ASC');
		$data['subnav'] = $this->db->get('sub_navigasi')->result_array();
		$data['row'] = $this->db->get('sub_navigasi')->num_rows();

		$data['title'] = 'Subnav Management';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('subnav/index', $data);
		$this->load->view('templates/footers', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Subnav';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['subnav'] = $this->db->get('sub_navigasi')->result_array();
		$data['nav'] = $this->db->get_where('navigasi', ['subnav' => 1])->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('subnav/add', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		} 
	}

	public function save()
	{
		$data = [
			'nav_id' => $this->input->post('nav_id'),
			'sub_nav_name' => $this->input->post('sub_nav_name'),
			'sub_nav_link' => $this->input->post('sub_nav_link'),
			'sub_nav_icon' => $this->input->post('sub_nav_icon')
		];

		$this->db->insert('sub_navigasi', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Subnav berhasil ditambahkan</div>');
		redirect('subnav');
	}

	public function delete($sub_nav_id)
	{
		$this->db->where('sub_nav_id', $sub_nav_id);
		$this->db->delete('sub_navigasi');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Berhasil menghapus subnav</div>');
		redirect('subnav');
	}

	public function edit($sub_nav_id)
	{
		$data['title'] = 'Edit Subnav';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['subnav'] = $this->db->get_where('sub_navigasi', ['sub_nav_id' => $sub_nav_id])->row_array();
		$data['nav'] = $this->db->get_where('navigasi', ['subnav' => 1])->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('subnav/edit', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function update($sub_nav_id)
	{
		$data = [
			'nav_id' => $this->input->post('nav_id'),
			'sub_nav_name' => $this->input->post('sub_nav_name'),
			'sub_nav_link' => $this->input->post('sub_nav_link'),
			'sub_nav_icon' => $this->input->post('sub_nav_icon')
		];

		$this->db->set($data);
		$this->db->where('sub_nav_id', $sub_nav_id);
		$this->db->update('sub_navigasi');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Berhasil memperbaharui subnav</div>');
		redirect('subnav');
	}

}
