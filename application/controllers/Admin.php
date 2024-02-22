<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {   
            $data = $this->session->userdata();
            $data['title'] = 'Dashboard';
            $data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['level'] = $this->session->userdata();
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates/footer');
    }

}