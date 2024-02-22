<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    // Untuk Connect semua ke Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sm_model');
		// $this->load->library('form_validation');
	}
	// end 

    public function index()
    {
        $data['title'] = 'Surat Masuk';
        $data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat_masuk'] = $this->Sm_model->getAllSm();
        $data['level'] = $this->session->userdata();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

}