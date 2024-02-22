<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// DomPdf
use Dompdf\Dompdf;
use Dompdf\Options;
require_once FCPATH . 'vendor/autoload.php';
// end

class Laporan_sm extends CI_Controller {

	// Untuk Connect semua ke Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sm_model');
		$this->load->model('Profil_model');
		
		// $this->load->library('form_validation');

		// masih punya dompdf
		$options = new Options();
		$options->set('defaultfont', 'Times New Roman');
		$dompdf = new Dompdf($options);
		// end

	}
	// end 

	// Halman Laporan Sm
	public function index()
	{
		if($this->session->userdata['level_user'] == 'admin'){
		$data['judul'] = 'Laporan Surat Masuk';
		$cek = $this->session->userdata;
		$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
		$data['surat_masuk'] = $this->Sm_model->getAllSm();
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['level'] = $this->session->userdata();
		// panggil model/select
		
		// end
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan_sm', $data);
        $this->load->view('templates/footer');

		}else if($this->session->userdata['level_user'] == 'pimpinan'){
		$data['judul'] = 'Laporan Surat Masuk';
		$cek = $this->session->userdata;
		$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
		$data['surat_masuk'] = $this->Sm_model->getAllSm();
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['level'] = $this->session->userdata();
		// panggil model/select
		
		// end
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan_sm', $data);
        $this->load->view('templates/footer');

		}else{
			$this->load->view('404');
			
		}

	}
	// end

	public function getData(){
		$data['judul'] = 'Laporan Surat Masuk';
		$cek = $this->session->userdata;
		$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);

		$tgl_awal = $this->input->get('tgl_awal');
		$tgl_akhir = $this->input->get('tgl_akhir');
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['level'] = $this->session->userdata();


        // Menangani form submission
        if (!empty($tgl_awal) && !empty($tgl_akhir)) {
            // Mendapatkan data berdasarkan rentang tanggal
            $data['surat_masuk'] = $this->Sm_model->getDataByTgl($tgl_awal, $tgl_akhir);
        } else {
            // Jika form belum disubmit, set data kosong
			$data['surat_masuk'] = $this->Sm_model->getAllSm();
        }

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan_sm', $data);
        $this->load->view('templates/footer');
	}

	public function cetakLaporan()
	{
		$tgl_awal = $this->input->get('tgl_awal');
		$tgl_akhir = $this->input->get('tgl_akhir');

		if (!empty($tgl_awal) && !empty($tgl_akhir)) {
			// menampilkan semua data
			$data = array(
				'surat_masuk' => $this->Sm_model->getDataByTgl($tgl_awal, $tgl_akhir),
			);
		}elseif((empty($tgl_awal) || (empty($tgl_akhir)))){
			// mengirim salah satu data jika hanya satu form yang terisi
			$this->session->set_flashdata('error', 'Harap isi kedua form tanggal');
			redirect('laporan_sm');
		}else{
			// kondisi jika tidak ada form yg diisi
			$data = array(
				'surat_masuk' => $this->Sm_model->getAllSm(),
			);
		}

		// load library dompdf
		$options = new Options();
		$options->set('isHtml5ParserEnabled', true);
		$options->set('isPhpEnabled', true);
		$options->set('isRemoteEnabled', true);
		// return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();

		$dompdf = new Dompdf($options);

		$html = $this->load->view('cetakLaporan', $data, true);
		$dompdf->loadHtml($html);

		$dompdf->setPaper('A4', 'landscape');

		// render pdf
		$dompdf->render();
		$nama_file_acak = random_string('alnum', 16);
		$dompdf->stream($nama_file_acak . '.pdf', array('Attachment' => 0));

	}

}
