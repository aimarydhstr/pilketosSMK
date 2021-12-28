<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
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
		$this->db->order_by('menu_name', 'ASC');
		$data['menu'] = $this->db->get('menu')->result_array();
		$data['row'] = $this->db->get('menu')->num_rows();

		$data['title'] = 'Menu Management';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footers', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Menu';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['menu'] = $this->db->get('menu')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/add', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		} 
	}

	public function save()
	{
		$data = [
			'menu_name' => $this->input->post('menu_name')
		];

		$this->db->insert('menu', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Menu berhasil ditambahkan</div>');
		redirect('menu');
	}

	public function delete($id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		$this->db->delete('menu');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Berhasil menghapus Menu</div>');
		redirect('menu');
	}

	public function edit($id_menu)
	{
		$data['title'] = 'Edit menu';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['menu'] = $this->db->get_where('menu', ['id_menu' => $id_menu])->row_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/edit', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function update($id_menu)
	{
		$data = [
			'menu_name' => $this->input->post('menu_name')
		];

		$this->db->set($data);
		$this->db->where('id_menu', $id_menu);
		$this->db->update('menu');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15 mb-20">Berhasil memperbaharui Menu</div>');
		redirect('menu');
	}

}
