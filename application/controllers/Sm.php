<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sm extends CI_Controller {
	
	// Untuk Connect semua ke Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sm_model');
		$this->load->model('Profil_model');
		// $this->load->library('form_validation');
	}
	// end 

	// untuk Halaman surat masuk
	public function index()
	{
		if ($this->session->userdata('level_user')){
			$data['judul'] = 'Surat Masuk';
			$cek = $this->session->userdata;
			$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
			// panggil model/select
			$data['surat_masuk'] = $this->Sm_model->getAllSm();
			$data['level'] = $this->session->userdata();
			// end
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('surat_masuk', $data);
			$this->load->view('templates/footer');

		}else{
			redirect('login');
		}
	}
	// end halaman surat masuk

	// halaman tambah 
	public function tambah()
	{
		$data['judul'] = 'tambah surat masuk';
		$data['error'] = '';
		$data['bagian'] = ['Umum', 'Pemerintahan', 'Politik', 'Keamanan dan Ketertiban', 'Kesejahteraan Rakyat', 'Perekonomian', 'Pekerjaan Umum dan Ketenagaan', 'Pengawasan', 'Kepegawaian', 'keuangan'];

		$this->load->view('templates/header', $data);
		$this->load->view('tambah_sm', $data);
		$this->load->view('templates/footer');
	}
	// end Halaman tambah

	// insert data
	public function add(){
		$data ['judul'] ='surat masuk';
		$data['bagian'] = ['Umum', 'Pemerintahan', 'Politik', 'Keamanan dan Ketertiban', 'Kesejahteraan Rakyat', 'Perekonomian', 'Pekerjaan Umum dan Ketenagaan', 'Pengawasan', 'Kepegawaian', 'keuangan'];
			
		$this->form_validation->set_rules('tgl_terima', 'tgl_terima', 'required');
		$this->form_validation->set_rules('tgl_arsipkan', 'tgl_arsipkan', 'required');
		$this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
		$this->form_validation->set_rules('bagian', 'bagian', 'required');
		$this->form_validation->set_rules('perihal', 'perihal', 'required');
		$this->form_validation->set_rules('instansi', 'instansi', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
        	$this->load->view('tambah_sm', $data);
        	$this->load->view('templates/footer');
		} else{
			$upload_file = array();

			// periksa file diunggah
			if (!empty($_FILES['file_sm']['name'])) {
				$config['upload_path'] = './file_sm/';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; //jenis file yg diizinkan
				$config['max_size'] = 1000;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('file_sm')) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error_message', $error['error']);

					redirect('sm/tambah', 'refresh');
				} else {
					$upload_file = $this->upload->data();
				}
				$data = [
					"tgl_diterima" => $this->input->post('tgl_terima', true),
					"tgl_diarsipkan" => $this->input->post('tgl_arsipkan', true),
					"no_surat" => $this->input->post('nomor_surat', true),
					"ke_bagian" => $this->input->post('bagian', true),
					"perihal_suratmasuk" => $this->input->post('perihal', true),
					"instansi" => $this->input->post('instansi', true),
					"alamat_pengirim" => $this->input->post('alamat', true),
					"file_surat" => (!empty($upload_file)) ? $upload_file['file_name'] : null,
				];
				
				$this->Sm_model->tambahSuratMasuk($data);
				$this->session->set_flashdata('flash', 'Berhasil Ditambahkan');
				redirect('sm');	
			}else{
				$data = [
					"tgl_diterima" => $this->input->post('tgl_terima', true),
					"tgl_diarsipkan" => $this->input->post('tgl_arsipkan', true),
					"no_surat" => $this->input->post('nomor_surat', true),
					"ke_bagian" => $this->input->post('bagian', true),
					"perihal_suratmasuk" => $this->input->post('perihal', true),
					"instansi" => $this->input->post('instansi', true),
					"alamat_pengirim" => $this->input->post('alamat', true),
					"file_surat" => (!empty($upload_file)) ? $upload_file['file_name'] : null,
				];
				
				$this->Sm_model->tambahSuratMasuk($data);
				$this->session->set_flashdata('flash', 'Berhasil Ditambahkan');
				redirect('sm');	
			}

		}
		
	}
	// end insert data

	// hapus surat masuk
	public function hapus($id)
	{
		$this->Sm_model->hapusSuratMasuk($id);
		$this->session->set_flashdata('flash', 'Berhasil Dihapus');
		redirect('sm');
	}
	// end hapus

	// detail surat masuk
	public function detail($id)
	{
		$data['judul'] = 'Detail Surat Masuk';
		$data['surat_masuk'] = $this->Sm_model->getSuratMasukById($id);

		$this->load->view('templates/header', $data);
        $this->load->view('detail_sm');
        $this->load->view('templates/footer');
	}

	// end detail

	// halaman ubdah
	public function ubah($id)
	{
		$data['judul'] = 'Ubah surat masuk';
		$data['surat_masuk'] = $this->Sm_model->getSuratMasukById($id);
		$data['bagian'] = ['Umum', 'Pemerintahan', 'Politik', 'Keamanan dan Ketertiban', 'Kesejahteraan Rakyat', 'Perekonomian', 'Pekerjaan Umum dan Ketenagaan', 'Pengawasan', 'Kepegawaian', 'keuangan'];

		$this->load->view('templates/header', $data);
		$this->load->view('ubah_sm', $data);
		$this->load->view('templates/footer');
	}
	// end Halaman tambah

	// edit data
	public function editSm()
	{
		$data['judul'] ='Edit surat Masuk';
		$id = $this->input->post('id');
		$data['surat_masuk'] = $this->Sm_model->getSuratMasukById($id);
		// var_dump($data);
		// die();
		$data['bagian'] = ['Umum', 'Pemerintahan', 'Politik', 'Keamanan dan Ketertiban', 'Kesejahteraan Rakyat', 'Perekonomian', 'Pekerjaan Umum dan Ketenagaan', 'Pengawasan', 'Kepegawaian', 'keuangan'];
			
		$this->form_validation->set_rules('tgl_terima', 'tgl_terima', 'required');
		$this->form_validation->set_rules('tgl_arsipkan', 'tgl_arsipkan', 'required');
		$this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
		$this->form_validation->set_rules('bagian', 'bagian', 'required');
		$this->form_validation->set_rules('perihal', 'perihal', 'required');
		$this->form_validation->set_rules('instansi', 'instansi', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');

		// $cek = $this->input->post('id_suratmasuk');

		if ($this->form_validation->run() == FALSE){
			// echo "data masuk";
			// die();
			$this->load->view('templates/header', $data);
        	$this->load->view('ubah_sm', $data);
        	$this->load->view('templates/footer');
		} else{

			$id_suratmasuk = $this->input->post('id');
			$ambil = $this->Sm_model->getSuratMasukById($id_suratmasuk);

			$name = './file_sm/' . $ambil['file_surat'];
			// var_dump($name);
			// die();
			$nama = '';
			$cek_file = $_FILES['file_sm']['name'];
			// Jika ada file baru diunggah
			if (!empty($_FILES['file_sm']['name'])) {
				if (is_readable($name) && is_file($name) && unlink($name)) {
					$config['upload_path'] = './file_sm/';
					$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
					$config['max_size']  = 1000;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					// var_dump($config);
					// die();

					if (!$this->upload->do_upload('file_sm')) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);
						var_dump($error['error']);
						die();
						redirect('sm/ubah/' . $id_suratmasuk, 'refresh');
					} else {
						$upload_data = $this->upload->data();
						$nama = $upload_data['file_name'];
					}
				}else{
					$config['upload_path'] = './file_sm/';
					$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
					$config['max_size']  = 1000;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					// var_dump($config);
					// die();

					if (!$this->upload->do_upload('file_sm')) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);
						var_dump($error['error']);
						die();
						redirect('sm/ubah/' . $id_suratmasuk, 'refresh');
					} else {
						$upload_data = $this->upload->data();
						$nama = $upload_data['file_name'];
					}
				}
			} else {
				// Jika tidak ada file baru diunggah, gunakan nama file yang ada
				$nama = $ambil['file_surat'];
			}

			$ubah = [
				"id_suratmasuk" => $id,
				"tgl_diterima" => $this->input->post('tgl_terima', true),
				"tgl_diarsipkan" => $this->input->post('tgl_arsipkan', true),
				"no_surat" => $this->input->post('nomor_surat', true),
				"ke_bagian" => $this->input->post('bagian', true),
				"perihal_suratmasuk" => $this->input->post('perihal', true),
				"instansi" => $this->input->post('instansi', true),
				"alamat_pengirim" => $this->input->post('alamat', true),
				"file_surat" => $nama,
			];
			
			$this->Sm_model->ubahSuratMasuk($ubah);
			$this->session->set_flashdata('flash', 'Berhasil Diubah');
			redirect('sm');	
		}
		
	}
	// end edit data

	// unduhhh
	public function unduh()
	{
		$nama_file = $this->input->post('file_surat');
		// var_dump($nama_file);
		// die();
		$this->load->helper('download');
		$file = FCPATH . 'file_sm/' . $nama_file;
		// var_dump($file);
		// die();

		if(!empty($nama_file)){

			if(file_exists($file)){
				$tipe_konten = mime_content_type($file);
	
				force_download($nama_file, file_get_contents($file), $tipe_konten);
			}else{
				echo "File Tidak Ditemukan!";
			}
		}else{
			// echo "File belum di tambahkan";
			$this->session->set_flashdata('flash', 'Belum Di Tambahkan');
		}
		redirect('sm', 'refresh');
	}

	// untuk disposisi
	public function disposisi()
	{
		$id = $this->input->post('id');
		$data['surat_masuk'] = $this->Sm_model->getSuratMasukById($id);
		// var_dump($data);
		// die();
		// $cek = $this->input->post('id_suratmasuk');

			$id_suratmasuk = $this->input->post('id');
			$ambil = $this->Sm_model->getSuratMasukById($id);

			$name = './file_disposisi/' . $ambil['file_disposisi'];
			// var_dump($name);
			// die();

			$nama = '';
			$cek_file = $_FILES['file_disposisi']['name'];
			// Jika ada file baru diunggah
			if (!empty($_FILES['file_disposisi']['name'])) {
				if (is_readable($name) && is_file($name) && unlink($name)) {
					$config['upload_path'] = './file_disposisi/';
					$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
					$config['max_size']  = 1000;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					// var_dump($config);
					// die();

					if (!$this->upload->do_upload('file_disposisi')) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);

						redirect('sm', 'refresh');
					} else {
						$upload_data = $this->upload->data();
						$nama = $upload_data['file_name'];
					}
				}else{
					$config['upload_path'] = './file_disposisi/';
					$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
					$config['max_size']  = 1000;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					// var_dump($config);
					// die();

					if (!$this->upload->do_upload('file_disposisi')) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);
						// var_dump($error['error']);
						// die();
						redirect('sm', 'refresh');
					} else {
						$upload_data = $this->upload->data();
						$nama = $upload_data['file_name'];
					}
				}
			} else {
				// Jika tidak ada file baru diunggah, gunakan nama file yang ada
				$nama = $ambil['file_disposisi'];
			}

			$ubah = [
				"id_suratmasuk" => $id,
				"file_disposisi" => $nama,
			];
			
			$this->Sm_model->uploadP($ubah);
			$this->session->set_flashdata('flash', ' Disposisi Berhasil Ditambah');
			redirect('sm');			
	}
	
	// end edit data
	
	// unduhhh disposisi
	public function unduhDisposisi()
	{
		$nama_file = $this->input->post('file_disposisi');
		// var_dump($nama_file);
		// die();
		$this->load->helper('download');
		$file = FCPATH . 'file_disposisi/' . $nama_file;
		// var_dump($file);
		// die();

		if(!empty($nama_file)){

			if(file_exists($file)){
				$tipe_konten = mime_content_type($file);
	
				force_download($nama_file, file_get_contents($file), $tipe_konten);
			}else{
				$this->session->set_flashdata('flash', 'Belum Di Tambahkan');
				redirect('sm', 'refresh');
			}
		}else{
			// echo "File belum di tambahkan";
			$this->session->set_flashdata('flash', 'Belum Di Tambahkan');
		}
		redirect('sm', 'refresh');
	}


}