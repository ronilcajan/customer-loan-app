<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Claims_controller extends CI_Controller {


	public function index(){

		if($this->session->userdata('logged_in')){
			redirect('dashboard');
		}

		$title['title'] = "RFSC - Login";
		$this->load->view('templates/header', $title);
		$this->load->view('login');
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
			
			if($data['user_type'] == 'Guest'){
				$validator['success'] = true;
				$validator['messages'] = 'guest';

			}elseif($data['user_type'] == 'Cashier'){
				$validator['success'] = true;
				$validator['messages'] = 'cashier';

			}elseif($data['user_type'] == 'Manager'){
				$validator['success'] = true;
				$validator['messages'] = 'manager';

			}else{
				$validator['success'] = true;
				$validator['messages'] = 'dashboard';					
			}
		}else{

			$validator['success'] = false;
			$validator['messages'] = 'Incorrect username or password. Please try again.';	
		}

		echo json_encode($validator);
		
	}

	public function error404(){

		$this->load->view('templates/header');
		$this->load->view('error404');
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
		$result['clients'] = $this->claims_model->get_num_borrowers();
		$result['payments'] = $this->claims_model->get_sum_payments();
		$result['active'] = $this->claims_model->get_actv_borrowers();
		$result['cash'] = $this->claims_model->get_csh_borrowers();
		$result['task'] = $this->claims_model->get_my_task($this->session->userdata('username'));

		$result['due'] = $this->claims_model->get_due_loan();

		$this->load->view('templates/header', $title);
		$this->load->view('dashboard', $result);
	}

	public function staff(){
		$this->check_auth('staff');

		$title['title'] = "RFSC - Staff List";

		$result['stafflist'] = $this->claims_model->get_staff();

		$this->load->view('templates/header', $title);
		$this->load->view('staff', $result);
	}

	public function user_profile($username=""){


		$this->check_auth('user_profile');

		$title['title'] = "RFSC - My Profile";

		$result['staff'] = $this->claims_model->get_user_profile($username);

		$result['task'] = $this->claims_model->get_my_task($this->session->userdata('username'));

		$this->load->view('templates/header', $title);
		$this->load->view('staff_profile',$result);
	}

	public function add_staff(){

		$validator = array('success' => false, 'messages' => array());

		$data = $this->input->post();

		$check_user = $this->claims_model->check_staff($data['username']);
		
		if(is_null($check_user)){

			if($data['name']){

				$insert_data = $this->claims_model->insert_new_staff($data);

				if($insert_data){

					$validator['success'] = true;
					$validator['messages'] = "Staff successfully added!";

				}else{
					$validator['success'] = false;
					$validator['messages'] = "Staff did not save!";
				}
			}else{
				$insert_data = $this->claims_model->insert_staff($data);

				if($insert_data){

					$validator['success'] = true;
					$validator['messages'] = "Staff successfully added!";

				}else{
					$validator['success'] = false;
					$validator['messages'] = "Staff did not save!";
				}
			}
		}else{
			$validator['success'] = false;
			$validator['messages'] = "Username already exist!";
		}
		
		echo json_encode($validator);
	}

	public function create_staff(){

		$validator = array('success' => false, 'messages' => array());

		$data = $this->input->post();

		$create_staff = $this->claims_model->create_staff($data);

		if($create_staff){

			$validator['success'] = true;
			$validator['messages'] = "Profile Completed!";

		}else{
			$validator['success'] = false;
			$validator['messages'] = "Profile did not save!";
		}
		
		
		echo json_encode($validator);
	}
	
	public function update_user_profile()
	{
		$validator = array('success' => false, 'messages' => array());

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('img')){

			$client_data = array(
				'username' => $this->session->userdata('username'),
				'img' => "",
				'email' => $this->input->post('email'),
				'num' => $this->input->post('num'),
				'bio' => $this->input->post('bio'),
				'mname' => $this->input->post('mname'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'address' => $this->input->post('address')
			);

			$update_profile = $this->claims_model->update_my_profile($client_data);
			

			if($update_profile){
				$validator['success'] = true;
				$validator['messages'] = 'Update successfully!';
			}else{
				$validator['success'] = false;
				$validator['messages'] = "Something went wrong!";
			}
		
		}else{
			$data = $this->upload->data();
			//Resize and Compress Image
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/'.$data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['quality'] = '60%';
			$config['width'] = 600;
			$config['height'] = 400;
			$config['new_image'] = './uploads/'.$data['file_name'];

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			

			$client_data = array(
				'username' => $this->session->userdata('username'),
				'img' => $data['file_name'],
				'email' => $this->input->post('email'),
				'num' => $this->input->post('num'),
				'bio' => $this->input->post('bio'),
				'mname' => $this->input->post('mname'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'address' => $this->input->post('address')
			);

			$update_profile = $this->claims_model->update_my_profile($client_data);

			if($update_profile){			
				$validator['success'] = true;
				$validator['messages'] = 'Update successfully!';
			}
		}

			echo json_encode($validator);
	}


	public function back_up(){

		$title['title'] = "RFSC - Back up";

		$this->load->view('templates/header', $title);
		$this->load->view('backup/back_up');
	}

	public function local_backup(){

		$this->load->dbutil();

		$backup = $this->dbutil->backup();

		$this->load->helper('file');

		$name = 'backup_'.date('m-d-Y_hi').'.gz';

		write_file('/path/to/'.$name ,$backup);

		$this->load->helper('download');

		force_download($name, $backup);
	}

	public function create_task(){
		$validator = array('success' => false, 'messages' => array());

		$data = $this->input->post();

		$task = $this->claims_model->create_task($data);

		if($task){

			$validator['success'] = true;
			$validator['messages'] = "Task Created!";

		}else{
			$validator['success'] = false;
			$validator['messages'] = "Failed to create task!";
		}
		
		
		echo json_encode($validator);
	}

	public function end_task(){

		$validator = array('success' => false, 'messages' => array());

		$data = $this->input->post();

		$task = $this->claims_model->end_task($data);

		if($task){

			$validator['success'] = true;
			$validator['messages'] = "Task Doned";

		}else{
			$validator['success'] = false;
			$validator['messages'] = "Failed to finish task!";
			}
		
		
		echo json_encode($validator);
	}

	public function remove_task(){

		$validator = array('success' => false, 'messages' => array());

		$data = $this->input->post();

		$task = $this->claims_model->remove_task($data);

		if($task){

			$validator['success'] = true;
			$validator['messages'] = "Task Remove";

		}else{
			$validator['success'] = false;
			$validator['messages'] = "Failed to removed task!";
			}
		
		
		echo json_encode($validator);
	} 

	public function update_task(){

		$validator = array('success' => false, 'messages' => array());

		$data = $this->input->post();

		$task = $this->claims_model->update_task($data);

		if($task){

			$validator['success'] = true;
			$validator['messages'] = "Task Updated";

		}else{
			$validator['success'] = false;
			$validator['messages'] = "Failed to update task!";
		}
		
		
		echo json_encode($validator);
	} 

	public function change_password(){
		$validator = array('success' => false, 'messages' => array());

		$data = $this->input->post();

		$result = $this->claims_model->change_pass($data);

		if($result){

			$validator['success'] = true;
			$validator['messages'] = "Password Successfully Changed.";

		}else{
			$validator['success'] = false;
			$validator['messages'] = "Password not change.";
		}

		echo json_encode($validator);
	} 


	public function remove_staff(){
		$result = $this->claims_model->remove_staff($this->input->post('username'));
		if($result){
			echo "User profile remove!";
		}else{
			echo "False";
		}
		
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
