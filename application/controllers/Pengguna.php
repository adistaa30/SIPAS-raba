<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	// Connect Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('P_model');
		$this->load->model('Profil_model');
	}
	// end

	public function index()
	{
		
		if($this->session->userdata['level_user'] == 'admin'){
		$data['judul'] = 'Pengguna';
		$cek = $this->session->userdata;
		$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
		$data['penggunaP'] = $this->P_model->getAllPengguna();
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['level'] = $this->session->userdata();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('akses/pengguna', $data);
			$this->load->view('templates/footer');

		}else{
			$this->load->view('404');
		}
	}

	public function tambahPengguna()
	{
		$data['judul'] = 'Pengguna';
		$cek = $this->session->userdata;
		$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
		$data['level_user'] = ['admin', 'kasi', 'pimpinan'];
		$data['active'] = ['active', 'noactive'];
		$data['error'] = '';
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['level'] = $this->session->userdata();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('akses/tambah_p', $data);
        $this->load->view('templates/footer');
	}

	public function addPengguna()
	{
		$data['judul'] = 'Tambah Pengguna';
		$cek = $this->session->userdata;
		$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
		$data['level_user'] = ['admin', 'kasi', 'pimpinan'];
		$data['active'] = ['active', 'noactive'];
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['level'] = $this->session->userdata();

		// valdasi
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('active', 'Activasi', 'required');
		// end validasi

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
        	$this->load->view('akses/tambah_p', $data);
        	$this->load->view('templates/footer');
		}else{
				$data = [
					"nama_user" => $this->input->post('nama', true),
					"nip_user" => $this->input->post('nip', true),
					"jabatan_user" => $this->input->post('jabatan', true),
					"level_user" => $this->input->post('level', true),
					"username" => $this->input->post('username', true),
					"password" => $this->input->post('password', true),
					"is_active" => $this->input->post('active', true),
				];
				
				$this->P_model->tambahPengguna($data);
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('pengguna');	
			}
	}
	// end insert data

	public function hapusPengguna($id)
	{
		$this->P_model->hapusP($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('pengguna');
	}

	public function ubahPengguna($id)
	{
		$data['judul'] = 'Pengguna';
		$cek = $this->session->userdata;
		$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
		$data['penggunaP'] = $this->P_model->getPenggunaById($id);
		$data['level_user'] = ['admin', 'kasi', 'pimpinan'];
		$data['active'] = ['active', 'noactive'];
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['level'] = $this->session->userdata();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('akses/ubah_p', $data);
        $this->load->view('templates/footer');
	}

	public function editPengguna()
	{
		$data['judul'] = 'Edit Pengguna';
		$cek = $this->session->userdata;
		$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
		$id = $this->input->post('id_user');
		$data['level_user'] = ['admin', 'kasi', 'pimpinan'];
		$data['active'] = ['active', 'noactive'];
		$data['penggunaP'] = $this->P_model->getPenggunaById($id);
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['level'] = $this->session->userdata();

		// valdasi
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('active', 'Activasi', 'required');
		// end validasi
		// $cek = $this->input->post('id_user');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
        	$this->load->view('akses/ubah_p', $data);
        	$this->load->view('templates/footer');
		}else{
				$data = [
					"id_user" => $id,
					"nama_user" => $this->input->post('nama', true),
					"nip_user" => $this->input->post('nip', true),
					"jabatan_user" => $this->input->post('jabatan', true),
					"level_user" => $this->input->post('level', true),
					"username" => $this->input->post('username', true),
					"password" => $this->input->post('password', true),
					"is_active" => $this->input->post('active', true),
				];
				
				$this->P_model->ubahPengguna($data);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('pengguna');	
			}
	}

}
