<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claims_controller extends CI_Controller {

	public function index(){
		$data['title'] = 'Login';
		$this->load->view('templates/header');
		$this->load->view('login',$data);
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
				'usertype' => $data['usertype'],
				'logged_in' => TRUE
			);

			$this->session->set_userdata($login_data);

			$validator['success'] = true;
			$validator['messages'] = 'dashboard';					

		}else{

			$validator['success'] = false;
			$validator['messages'] = 'Incorrect username/password combination';	
		}

		echo json_encode($validator);
		
	}

	public function dashboard(){

		$this->load->view('templates/header');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}

	public function borrowers(){

		$this->load->view('templates/header');
		$this->load->view('borrowers');
		$this->load->view('templates/footer');
	}
}
