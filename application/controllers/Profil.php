<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	// Connect Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profil_model');
		$this->load->library('session');
	}
	// end

	public function index()
	{
		// Cek apakah pengguna sudah login
        if ($this->session->userdata('level_user')) {
			$username = $this->session->userdata('username');
            // Dapatkan data pengguna berdasarkan username
            $data['user'] = $this->Profil_model->get_user_by_username($username);
			$cek = $this->session->userdata;
			$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
			$data['judul'] = 'Pengguna';
			$data['profil'] = $this->Profil_model->getAllProfil();
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
			$data['level'] = $this->session->userdata();
			$data['photos'] = $this->Profil_model->getPhotos();
			

            // Tampilkan data pengguna di view
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('profil', $data);
			$this->load->view('templates/footer');
            
        } else {
            // Jika pengguna belum login, redirect atau tampilkan pesan sesuai kebijakan aplikasi Anda
            redirect('login'); // Ganti 'login' dengan alamat login sesuai aplikasi Anda
        }

	}

	public function update_profile() {
        // Cek apakah pengguna sudah login
        if ($this->session->userdata('level_user')) {

            $username = $this->session->userdata('username');
			$data['judul'] = 'Edit Pengguna';
			$id = $this->input->post('id_user');
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
			$data['level'] = $this->session->userdata();
			$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);

		// valdasi
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		// end validasi
		// $cek = $this->input->post('id_user');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
        	$this->load->view('profil', $data);
        	$this->load->view('templates/footer');
			
		}else{
				// Update data profil pengguna
            $data = array(
					"nama_user" => $this->input->post('nama', true),
					"nip_user" => $this->input->post('nip', true),
					"jabatan_user" => $this->input->post('jabatan', true),
					"username" => $this->input->post('username', true),
					"password" => $this->input->post('password', true),
                // ... (tambahkan field lain sesuai kebutuhan)
            );

            $this->Profil_model->update_user_profile($username, $data);
            // Redirect atau tampilkan pesan sukses
			$this->session->set_flashdata('flash', 'Diubah');
            redirect('profil');
        } 
        }else {
            // Jika pengguna belum login, redirect atau tampilkan pesan sesuai kebijakan aplikasi Anda
            redirect('login'); // Ganti 'login' dengan alamat login sesuai aplikasi Anda
		}
    }

	public function uploadFoto()
	{
		$id = $this->input->post('id_user');
		$data['pengguna'] = $this->Profil_model->getPenggunaById($id);

		// $cek = $this->input->post('id_suratmasuk');

			$id_user = $this->input->post('id');
			$ambil = $this->Profil_model->getPenggunaById($id);

			$name = './file_foto/' . $ambil['foto_user'];
			// var_dump($name);
			// die();

			$nama = '';
			$cek_file = $_FILES['file_foto']['name'];
			// Jika ada file baru diunggah
			if (!empty($_FILES['file_foto']['name'])) {
				if (is_readable($name) && is_file($name) && unlink($name)) {
					$config['upload_path'] = './file_foto/';
					$config['allowed_types'] = 'jpg|jpeg|png'; // Sesuaikan jenis file yang diizinkan
					$config['max_size']  = 1000;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					// var_dump($config);
					// die();

					if (!$this->upload->do_upload('file_foto')) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);

						redirect('profil', 'refresh');
					} else {
						$upload_data = $this->upload->data();
						$nama = $upload_data['file_name'];
					}
				}else{
					$config['upload_path'] = './file_foto/';
					$config['allowed_types'] = 'jpg|jpeg|png'; // Sesuaikan jenis file yang diizinkan
					$config['max_size']  = 1000;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					// var_dump($config);
					// die();

					if (!$this->upload->do_upload('file_foto')) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);
						// var_dump($error['error']);
						// die();
						redirect('profil', 'refresh');
					} else {
						$upload_data = $this->upload->data();
						$nama = $upload_data['file_name'];
					}
				}
			} else {
				// Jika tidak ada file baru diunggah, gunakan nama file yang ada
				$nama = $ambil['foto_user'];
			}

			$ubah = [
				"id_user" => $id,
				"foto_user" => $nama,
			];
			
			$this->Profil_model->uploadP($ubah);
			$this->session->set_flashdata('flash', 'Berhasil Diubah');
			redirect('profil');	
		
	}
	// end edit data

}
