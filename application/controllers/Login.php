<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	// Connect Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('P_model');
		$this->load->helper('cookie');
	}
	// end

	public function index()
	{
		$data['judul'] = 'Login';
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('login');
		}else{
			$this->_login();
		}
	}

	private function _login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
		
		if (!empty($user)) {
			// user ada
			if($user['is_active'] === 'active'){
				// cek password
				if ($password == $user['password']) {
					$data = [
						'id_user' => $user['id_user'],
						'username' => $user['username'],
						'level_user' => $user['level_user']
					];
					$this->session->set_userdata($data);

					if(!empty($this->input->post('save_id')))
					{
						setcookie ("loginId", $username, time()+ (10 * 365 * 24 * 60 * 60));
						setcookie ("loginPass", $password, time()+ (10 * 365 * 24 * 60 * 60));
					}else{
						setcookie ("loginId","");
						setcookie ("loginPass","");
					}

					if($user['level_user'] == 'admin'){
						redirect('dashboard');
					}elseif($user['level_user'] == 'kasi'){
						redirect('dashboard');
					}elseif($user['level_user'] == 'pimpinan'){
						redirect('dashboard');
					}

				}else{
					$this->session->set_flashdata('message', 'Wrong Password');
					redirect('login');	

				}

			}else{
				$this->session->set_flashdata('message', 'User is not Active');
				redirect('login');	
			}

		}else{
			$this->session->set_flashdata('message', 'Username is not valid');
			redirect('login');
		}
	}

	// logout
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level_user');

		$this->session->set_flashdata('message', 'You Have been Login Out!');
			redirect('login');
	}

}
