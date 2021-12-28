<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$ci = get_instance();
		
		if($ci->session->userdata('nis') || !$ci->session->userdata('username') || $ci->session->userdata('id_role') == 1) {
			redirect('auth/login');
		} 
	}

	public function index()
	{	

		$data['meta'] = $this->db->get('meta')->row_array();
		$data['user'] = $this->db->get_where('akun', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->group_by('kelas');
		$data['kelas'] = $this->db->get('kelas')->result_array();

		$data['title'] = 'Kelas';
		$this->load->view('templates/headers', $data);
		$this->load->view('data/index', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/bawahan', $data);
		
	}

	public function sesi($kelas)
	{

		$data['meta'] = $this->db->get('meta')->row_array();
		$data['user'] = $this->db->get_where('akun', ['username' => $this->session->userdata('username')])->row_array();

		if (!isset($_POST['s'])) {
			$this->db->order_by('jurusan', 'ASC');
			$data['kelas'] = $this->db->get_where('kelas', ['kelas' => $kelas])->result_array();
			$data['jml'] = $this->db->get_where('kelas', ['kelas' => $kelas])->num_rows();
		} else {

			$kata = $_POST['s'];
			$q = "SELECT * FROM kelas WHERE kelas = '$kelas' AND jurusan LIKE '%$kata%' ORDER BY jurusan ASC";
			$data['kelas'] = $this->db->query($q)->result_array();
			$data['jml'] = $this->db->query($q)->num_rows();
		}
		
		$data['title'] = 'Sesi Kelas '.$kelas;
		$data['kls'] = $kelas;
		$this->load->view('templates/headers', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('data/sesi', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function list($kelas)
	{

		$data['meta'] = $this->db->get('meta')->row_array();
		$data['user'] = $this->db->get_where('akun', ['username' => $this->session->userdata('username')])->row_array();

		if (!isset($_POST['s'])) {
			$this->db->order_by('jurusan', 'ASC');
			$data['kelas'] = $this->db->get_where('kelas', ['kelas' => $kelas])->result_array();
			$data['jml'] = $this->db->get_where('kelas', ['kelas' => $kelas])->num_rows();
		} else {

			$kata = $_POST['s'];
			$q = "SELECT * FROM kelas WHERE kelas = '$kelas' AND jurusan LIKE '%$kata%' ORDER BY jurusan ASC";
			$data['kelas'] = $this->db->query($q)->result_array();
			$data['jml'] = $this->db->query($q)->num_rows();
		}
		
		$data['title'] = 'List Kelas '.$kelas;
		$data['kls'] = $kelas;
		$this->load->view('templates/headers', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('data/list', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function siswa($kelas, $id_kelas)
	{

		$data['meta'] = $this->db->get('meta')->row_array();
		$data['user'] = $this->db->get_where('akun', ['username' => $this->session->userdata('username')])->row_array();

		if (!isset($_POST['s'])) {
			$this->db->order_by('nama_siswa', 'ASC');
			$data['siswa'] = $this->db->get_where('siswa', ['id_kelas' => $id_kelas])->result_array();
			$data['jml'] = $this->db->get_where('siswa', ['id_kelas' => $id_kelas])->num_rows();
		} else {

			$kata = $_POST['s'];
			$q = "SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND nama_siswa LIKE '%$kata%' ORDER BY nama_siswa ASC";
			$data['siswa'] = $this->db->query($q)->result_array();
			$data['jml'] = $this->db->query($q)->num_rows();
		}

		$kls = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
		
		$data['title'] = $kelas.' '.$kls['jurusan'];
		$data['kls'] = $kelas;
		$data['kelas'] = $id_kelas;
		$this->load->view('templates/headers', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('data/siswa', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/bawahan', $data);
	}

	public function active($id_kelas, $is_active)
	{
		$kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();

		$is_active = $is_active + 1;

		$this->db->set('is_active', $is_active);
		$this->db->where('id_kelas', $id_kelas);
		$this->db->update('kelas');

		$this->session->set_flashdata('message', '<div class="alert alert-success w-100 mx-15 mb-20 mt-20">Berhasil memperbaharui sesi</div>');
		redirect('data/sesi/'.$kelas['kelas']);
	}

}