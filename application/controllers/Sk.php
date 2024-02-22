<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sk extends CI_Controller {
	// Connect Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sk_model');
		$this->load->model('Profil_model');
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['level'] = $this->session->userdata();
	}
	// end

	public function index()
	{
		if ($this->session->userdata('level_user')){
			$data['judul'] = 'Surat Keluar';
			$cek = $this->session->userdata;
			$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
			// panggil model/select
			$data['surat_keluar'] = $this->Sk_model->getAllSk();
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
			$data['level'] = $this->session->userdata();
			// end
	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('suratkeluar/surat_keluar', $data);
			$this->load->view('templates/footer');

		}else{
			redirect('login');
		}
	}
	// select surat masuk

	// view tambah sk
	public function tambahSk()
	{
		$data['judul'] = 'Tambah Surat Keluar';
		$data['bagian'] = ['Umum', 'Pemerintahan', 'Politik', 'Keamanan dan Ketertiban', 'Kesejahteraan Rakyat', 'Perekonomian', 'Pekerjaan Umum dan Ketenagaan', 'Pengawasan', 'Kepegawaian', 'keuangan'];
		$data['error'] = '';
	
			$this->load->view('templates/header', $data);
			$this->load->view('suratkeluar/tambah_sk', $data);
			$this->load->view('templates/footer');
	}

	// end

	// Insert surat keluar
	public function addSk()
	{
		$data['judul'] = 'Tambah Data';
		$data['bagian'] = ['Umum', 'Pemerintahan', 'Politik', 'Keamanan dan Ketertiban', 'Kesejahteraan Rakyat', 'Perekonomian', 'Pekerjaan Umum dan Ketenagaan', 'Pengawasan', 'Kepegawaian', 'keuangan'];

		// valdasi
		$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('klasifikasi', 'No Klasifikasi', 'required');
		$this->form_validation->set_rules('no_urut', 'Nomor Urut', 'required');
		$this->form_validation->set_rules('kd_urusan', 'Kode Urusan', 'required');
		$this->form_validation->set_rules('kd_bulan', 'Kode Bulan', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('bagian', 'bagian', 'required');
		$this->form_validation->set_rules('perihal', 'perihal', 'required');
		$this->form_validation->set_rules('kepada', 'kepada', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		// end validasi

		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
        	$this->load->view('suratkeluar/tambah_sk', $data);
        	$this->load->view('templates/footer');
		}else{
			$upload_file = array();

			// periksa file diunggah
			if (!empty($_FILES['file_sk']['name'])) {
				$config['upload_path'] = './file_sk/';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; //jenis file yg diizinkan
				$config['max_size'] = 1000;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('file_sk')) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error_message', $error['error']);

					redirect('sk/tambahSk', 'refresh');
				} else {
					$upload_file = $this->upload->data();
				}
				$data = [
					"no_surat" => $this->input->post('no_surat', true),
					"no_klasifikasi" => $this->input->post('klasifikasi', true),
					"no_urut" => $this->input->post('no_urut', true),
					"kd_urusan" => $this->input->post('kd_urusan', true),
					"kd_bulan" => $this->input->post('kd_bulan', true),
					"tgl_suratkeluar" => $this->input->post('tgl_surat', true),
					"dari_bagian" => $this->input->post('bagian', true),
					"perihal_suratkeluar" => $this->input->post('perihal', true),
					"kepada" => $this->input->post('kepada', true),
					"alamat_penerima" => $this->input->post('alamat', true),
					"file_sk" => (!empty($upload_file)) ? $upload_file['file_name'] : null,
				];
				
				$this->Sk_model->tambahSuratKeluar($data);
				$this->session->set_flashdata('flash', 'Berhasil Ditambahkan');
				redirect('sk');	
			}else{
				$data = [
					"no_surat" => $this->input->post('no_surat', true),
					"no_klasifikasi" => $this->input->post('klasifikasi', true),
					"no_urut" => $this->input->post('no_urut', true),
					"kd_urusan" => $this->input->post('kd_urusan', true),
					"kd_bulan" => $this->input->post('kd_bulan', true),
					"tgl_suratkeluar" => $this->input->post('tgl_surat', true),
					"dari_bagian" => $this->input->post('bagian', true),
					"perihal_suratkeluar" => $this->input->post('perihal', true),
					"kepada" => $this->input->post('kepada', true),
					"alamat_penerima" => $this->input->post('alamat', true),
					"file_sk" => (!empty($upload_file)) ? $upload_file['file_name'] : null,
				];
				
				$this->Sk_model->tambahSuratKeluar($data);
				$this->session->set_flashdata('flash', 'Berhasil Ditambahkan');
				redirect('sk');	
			}
		}
	}
	// end insert data

	// Hapus Surat keluar
	public function hapusSk($id)
	{
		$this->Sk_model->hapusSuratKeluar($id);
		$this->session->set_flashdata('flash', 'Berhasil Dihapus');
		redirect('sk');
	}
	// end hapus

	// detail surat masuk
	public function detailSk($id)
	{
		$data['judul'] = 'Detail Surat Keluar';
		$data['surat_keluar'] = $this->Sk_model->getSuratKeluarById($id);
		$data['bagian'] = ['Umum', 'Pemerintahan', 'Politik', 'Keamanan dan Ketertiban', 'Kesejahteraan Rakyat', 'Perekonomian', 'Pekerjaan Umum dan Ketenagaan', 'Pengawasan', 'Kepegawaian', 'keuangan'];

		$this->load->view('templates/header', $data);
        $this->load->view('suratkeluar/detail_sk', $data);
        $this->load->view('templates/footer');
	}
	// end detail

	// halaman ubdah
	public function ubahSk($id)
	{
		$data['judul'] = 'Ubah surat keluar';
		$data['surat_keluar'] = $this->Sk_model->getSuratKeluarById($id);
		$data['bagian'] = ['Umum', 'Pemerintahan', 'Politik', 'Keamanan dan Ketertiban', 'Kesejahteraan Rakyat', 'Perekonomian', 'Pekerjaan Umum dan Ketenagaan', 'Pengawasan', 'Kepegawaian', 'keuangan'];

		$this->load->view('templates/header', $data);
		$this->load->view('suratkeluar/ubah_sk', $data);
		$this->load->view('templates/footer');
	}
	// end 

	// Edit surat keluar
	public function editSk(){
		$data['judul'] ='Edit surat Keluar';
		$id = $this->input->post('id');
		$data['surat_keluar'] = $this->Sk_model->getSuratKeluarById($id);
		$data['bagian'] = ['Umum', 'Pemerintahan', 'Politik', 'Keamanan dan Ketertiban', 'Kesejahteraan Rakyat', 'Perekonomian', 'Pekerjaan Umum dan Ketenagaan', 'Pengawasan', 'Kepegawaian', 'keuangan'];
			
		$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('klasifikasi', 'No Klasifikasi', 'required');
		$this->form_validation->set_rules('no_urut', 'Nomor Urut', 'required');
		$this->form_validation->set_rules('kd_urusan', 'Kode Urusan', 'required');
		$this->form_validation->set_rules('kd_bulan', 'Kode Bulan', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('bagian', 'bagian', 'required');
		$this->form_validation->set_rules('perihal', 'perihal', 'required');
		$this->form_validation->set_rules('kepada', 'kepada', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');

		// $cek = $this->input->post('id_suratkeluar');

		// if ($this->form_validation->run() == FALSE){
		// 	$this->load->view('templates/header', $data);
        // 	$this->load->view('suratkeluar/ubah_sk', $data);
        // 	$this->load->view('templates/footer');
		// } else{
			if ($this->form_validation->run() == FALSE){
				// echo "data masuk";
				// die();
				$this->load->view('templates/header', $data);
				$this->load->view('ubah_sk', $data);
				$this->load->view('templates/footer');
			} else{
	
				$id_suratkeluar = $this->input->post('id');
				$ambil = $this->Sk_model->getSuratKeluarById($id_suratkeluar);
	
				$name = './file_sk/' . $ambil['file_sk'];
				// var_dump($name);
				// die();
				$nama = '';
				$cek_file = $_FILES['file_sk']['name'];
				// Jika ada file baru diunggah
				if (!empty($_FILES['file_sk']['name'])) {
					if (is_readable($name) && is_file($name) && unlink($name)) {
						$config['upload_path'] = './file_sk/';
						$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
						$config['max_size']  = 1000;
	
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						// var_dump($config);
						// die();
	
						if (!$this->upload->do_upload('file_sk')) {
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata('error_message', $error['error']);
							var_dump($error['error']);
							die();
							redirect('sk/ubahSk/' . $id_suratkeluar, 'refresh');
						} else {
							$upload_data = $this->upload->data();
							$nama = $upload_data['file_name'];
						}
					}else{
						$config['upload_path'] = './file_sk/';
						$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
						$config['max_size']  = 1000;
	
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						// var_dump($config);
						// die();
	
						if (!$this->upload->do_upload('file_sk')) {
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata('error_message', $error['error']);
							var_dump($error['error']);
							die();
							redirect('sm/ubahSk/' . $id_suratkeluar, 'refresh');
						} else {
							$upload_data = $this->upload->data();
							$nama = $upload_data['file_name'];
						}
					}
				} else {
					// Jika tidak ada file baru diunggah, gunakan nama file yang ada
					$nama = $ambil['file_sk'];
				}

			$data = [
				"id_suratkeluar" => $id,
				"no_surat" => $this->input->post('no_surat', true),
				"no_klasifikasi" => $this->input->post('klasifikasi', true),
				"no_urut" => $this->input->post('no_urut', true),
				"kd_urusan" => $this->input->post('kd_urusan', true),
				"kd_bulan" => $this->input->post('kd_bulan', true),
				"tgl_suratkeluar" => $this->input->post('tgl_surat', true),
				"dari_bagian" => $this->input->post('bagian', true),
				"perihal_suratkeluar" => $this->input->post('perihal', true),
				"kepada" => $this->input->post('kepada', true),
				"alamat_penerima" => $this->input->post('alamat', true),
				"file_sk" => $nama,
			];
			
			$this->Sk_model->ubahSuratKeluar($data);
			$this->session->set_flashdata('flash', 'Berhasil Diubah');
			redirect('sk');	
		}
		
	}
	// end edit data

	// unduhhh
	public function unduhSk()
	{
		$nama_file = $this->input->post('file_sk');
		// var_dump($nama_file);
		// die();
		$this->load->helper('download');
		$file = FCPATH . 'file_sk/' . $nama_file;
		// var_dump($file);
		// die();

		if(!empty($nama_file)){

			if(file_exists($file)){
				$tipe_konten = mime_content_type($file);
	
				force_download($nama_file, file_get_contents($file), $tipe_konten);
			}else{
				// echo "File Tidak Ditemukan!";
				$this->session->set_flashdata('flash', 'Belum Di Tambahkan!');
			}
		}else{
			// echo "File belum di tambahkan";
			$this->session->set_flashdata('flash', 'Belum Di Tambahkan!');
		}
		redirect('sk', 'refresh');
	}

	// untuk disposisi
	public function disposisiSk()
	{
		$id = $this->input->post('id');
		$data['surat_keluar'] = $this->Sk_model->getSuratKeluarById($id);
		// var_dump($data);
		// die();
		// $cek = $this->input->post('id_suratmasuk');

			$id_suratkeluar = $this->input->post('id');
			$ambil = $this->Sk_model->getSuratKeluarById($id);

			$name = './file_disposisisk/' . $ambil['file_disposisisk'];
			// var_dump($name);
			// die();

			$nama = '';
			$cek_file = $_FILES['file_disposisisk']['name'];
			// var_dump($cek_file);
			// die();
			// Jika ada file baru diunggah
			if (!empty($_FILES['file_disposisisk']['name'])) {
				if (is_readable($name) && is_file($name) && unlink($name)) {
					$config['upload_path'] = './file_disposisisk/';
					$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
					$config['max_size']  = 1000;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					// var_dump($config);
					// die();

					if (!$this->upload->do_upload('file_disposisisk')) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);

						redirect('sk', 'refresh');
					} else {
						$upload_data = $this->upload->data();
						$nama = $upload_data['file_name'];
					}
				}else{
					$config['upload_path'] = './file_disposisisk/';
					$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
					$config['max_size']  = 1000;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					// var_dump($config);
					// die();

					if (!$this->upload->do_upload('file_disposisisk')) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);
						// var_dump($error['error']);
						// die();
						redirect('sk', 'refresh');
					} else {
						$upload_data = $this->upload->data();
						$nama = $upload_data['file_name'];
					}
				}
			} else {
				// Jika tidak ada file baru diunggah, gunakan nama file yang ada
				$nama = $ambil['file_disposisisk'];
			}

			$ubah = [
				"id_suratkeluar" => $id,
				"file_disposisisk" => $nama,
			];
			
			$this->Sk_model->uploadP($ubah);
			$this->session->set_flashdata('flash', ' Disposisi Berhasil Ditambah');
			redirect('sk');
	}	
	// end edit data

	// unduhhh disposisi
	public function unduhDisposisiSk()
	{
		$nama_file = $this->input->post('file_disposisisk');
		// var_dump($nama_file);
		// die();
		$this->load->helper('download');
		$file = FCPATH . 'file_disposisisk/' . $nama_file;
		// var_dump($file);
		// die();

		if(!empty($nama_file)){

			if(file_exists($file)){
				$tipe_konten = mime_content_type($file);
	
				force_download($nama_file, file_get_contents($file), $tipe_konten);
			}else{
				$this->session->set_flashdata('flash', 'Belum Di Tambahkan');
				redirect('sk', 'refresh');
			}
		}else{
			// echo "File belum di tambahkan";
			$this->session->set_flashdata('flash', 'Belum Di Tambahkan');
		}
		redirect('sk', 'refresh');
	}

}
