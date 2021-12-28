<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller
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

		$data['calon'] = $this->vote->a();
		$data['row'] = $this->vote->row();

		$data['title'] = 'Kandidat Management';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kandidat/index', $data);
		$this->load->view('templates/footers', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Kandidat';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['siswa'] = $this->db->get_where('siswa', ['ikut' => 2])->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kandidat/add', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function save()
	{
		$siswa = $this->db->get_where('siswa', ['nis' => $this->input->post('nis')])->row_array();
		$id_kelas = $siswa['id_kelas'];

		$upload_image = $_FILES['foto']['name'];

		if($upload_image) {
			$config['upload_path']		 = './assets/img/';
			$config['allowed_types'] 	 = 'gif|jpg|png|jpeg|tiff';
			$config['max_size']   		 = '2048';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {

				$new_image = $this->upload->data('file_name');

			} else {
				echo $this->upload->display_errors();
			}

			$data = [
				'nis' => $this->input->post('nis'),
				'id_kelas' => $id_kelas,
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi'),
				'moto' => $this->input->post('moto'),
				'foto' => $this->upload->data('file_name')
			];

		} else {
			$data = [
				'nis' => $this->input->post('nis'),
				'id_kelas' => $id_kelas,
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi'),
				'moto' => $this->input->post('moto')
			];
		}

		$this->db->insert('calon', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15">Kandidat berhasil ditambahkan</div>');
		redirect('kandidat');
	}

	public function delete($id_calon)
	{
		$this->db->where('id_calon', $id_calon);
		$this->db->delete('calon');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15">Berhasil menghapus kandidat</div>');
		redirect('kandidat');
	}

	public function edit($id_calon)
	{
		$data['title'] = 'Edit Kandidat';
		$data['meta'] = $this->db->get('meta')->row_array();
		$data['siswa'] = $this->db->get_where('siswa', ['ikut' => 2])->result_array();
		$data['calon'] = $this->db->get_where('calon', ['id_calon' => $id_calon])->row_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kandidat/edit', $data);
			$this->load->view('templates/footers', $data);
			$this->load->view('templates/bawahan', $data);
		}
	}

	public function update($id_calon)
	{
		$siswa = $this->db->get_where('siswa', ['nis' => $this->input->post('nis')])->row_array();
		$id_kelas = $siswa['id_kelas'];
		$upload_image = $_FILES['foto']['name'];

		if($upload_image) {
			$config['upload_path']		 = './assets/img/';
			$config['allowed_types'] 	 = 'gif|jpg|png|jpeg|tiff';
			$config['max_size']   		 = '2048';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {

				$old_image = $data['calon']['foto'];
				
				if ($old_image != 'noimage.png') {
					unlink(FCPATH.'assets/img/'.$old_image);
				}

				$new_image = $this->upload->data('file_name');
				$this->db->set('foto', $new_image);

			} else {
				echo $this->upload->display_errors();
			}

			$data = [
				'nis' => $this->input->post('nis'),
				'id_kelas' => $id_kelas,
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi'),
				'moto' => $this->input->post('moto')
			];

		}

		$data = [
				'nis' => $this->input->post('nis'),
				'id_kelas' => $id_kelas,
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi'),
				'moto' => $this->input->post('moto')
			];
		
		$this->db->set($data);
		$this->db->where('id_calon', $id_calon);
		$this->db->update('calon');

		$this->session->set_flashdata('message', '<div class="alert alert-success mx-15">Berhasil memperbaharui kandidat</div>');
		redirect('kandidat');
	}

}
