<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// Untuk Connect semua ke Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sm_model');
		$this->load->model('Profil_model');
		// $this->load->library('form_validation');
	}
	// end 

	public function index()
	{
		if ($this->session->userdata('level_user')){
			$data['judul'] = 'Dashboard';
			$cek = $this->session->userdata;
			$data['pengguna'] = $this->Profil_model->getPenggunaById($cek['id_user']);
			$data['level'] = $this->session->userdata();
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
			$data['level'] = $this->session->userdata();
			$data['hitung'] = $this->Sm_model->count_data();
			$data['hitung_sk'] = $this->Sm_model->countSk();
			$data['hitung_p'] = $this->Sm_model->countP();
			$data['hitungAll'] = $this->Sm_model->count_total_data();

			$pemesanan = $this->Sm_model->getChartData();
			$chart_data = [];
                foreach ($pemesanan as $row) {
                    $bulan_tahun = $row['bulan'] . '/' . $row['tahun'];
                    $chart_data[$bulan_tahun] = $row['jumlah_surat'];
                    // var_dump($row);
                }
                // die();
                $data['labels'] = json_encode(array_keys($chart_data));
                $data['values'] = json_encode(array_values($chart_data));


			// var_dump($data['labels']);
			// var_dump($data['values']);
			// die();
	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dashboard', $data);
			$this->load->view('templates/footer');

		}else{
			redirect('login');
		}
	}
}
