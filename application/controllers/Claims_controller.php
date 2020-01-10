<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claims_controller extends CI_Controller {

	public function index(){
		$this->load->view('templates/header');
		$this->load->view('login');
		$this->load->view('templates/footer');
	}

	public function login(){
		$validator = array('success' => false, 'messages' => array());

		$login_data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$data = $this->claims_model->login_user($login_data);

		if(!is_null($data)){
			$login_data = array(
				'username' => $data['username'],
				'password' => $data['password'],
				'usertype' => $data['user_type'],
				'logged_in' => TRUE
			);

			$this->session->set_userdata($login_data);

			$validator['success'] = true;
			$validator['messages'] = 'dashboard';					

		}else{

			$validator['success'] = false;
			$validator['messages'] = 'Incorrect username or password. Please try again.';	
		}

		echo json_encode($validator);
		
	}

	public function error404(){

		$this->load->view('templates/header');
		$this->load->view('error404');
		$this->load->view('templates/footer');
	}

	//function to check if user is in session
    public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect(base_url());
        }
    }

	public function dashboard(){

		$this->check_auth('borrowers');

		$this->load->view('templates/header');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}
	
	function logout(){
		$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
				if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
					$this->session->unset_userdata($key);
				}
			}
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
