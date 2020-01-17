<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claims_controller extends CI_Controller {

	public function index(){

		$title['title'] = "RFSC - Login";
		$this->load->view('templates/header', $title);
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

		$title['title'] = "Dashboard";

		$this->check_auth('dashboard');

		$this->load->view('templates/header', $title);
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}

	public function staff(){
		$this->check_auth('staff');

		$title['title'] = "RFSC - Staff";

		$result['staff'] = $this->claims_model->get_staff();



		$this->load->view('templates/header', $title);
		$this->load->view('staff', $result);
		$this->load->view('templates/footer');
	}

	public function add_staff(){

		$validator = array('success' => false, 'messages' => array());

		$data = $this->input->post();

		$check_user = $this->claims_model->check_staff($data['username']);

		if(is_null($check_user)){

			$insert_data = $this->claims_model->insert_staff($data);

			if($insert_data){

				$validator['success'] = true;
				$validator['messages'] = "Staff successfully added!";

			}else{
				$validator['success'] = false;
				$validator['messages'] = "Staff did not save!";
			}
		}else{
			$validator['success'] = false;
			$validator['messages'] = "Username already exist!";
		}
		
		echo json_encode($validator);
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
