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

	public function borrowers(){

		$this->check_auth('borrowers');
		
		//new clients query
		$clients['new_clients'] = $this->claims_model->get_new_clients();

		//get last account_no of client
		$account_no = $this->claims_model->get_account_id();

		if(is_null($account_no)){

			$clients['acc_no'] = 1000;

			$this->load->view('templates/header');
			$this->load->view('borrowers', $clients);
			$this->load->view('templates/footer');

		}else{
			$clients['acc_no'] = array('account_no' => $account_no['account_no']);
			
			$this->load->view('templates/header');
			$this->load->view('borrowers', $clients);
			$this->load->view('templates/footer');
		}
		

		
	}

	public function register_client()
	{
		$validator = array('success' => false, 'messages' => array());

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('client_img')){
			$validator['success'] = false;
			$validator['messages'] = 'Image not found';
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
				'account_no' => $this->input->post('account_no'),
				'client_img' => $data['file_name'],
				'mname' => $this->input->post('mname'),
				'gname' => $this->input->post('gname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'number1' => $this->input->post('number1'),
				'number2' => $this->input->post('number2'),
				'purok_no' => $this->input->post('purok_no'),
				'barangay' => $this->input->post('barangay'),
				'city' => $this->input->post('city'),
				'province' => $this->input->post('province'),
				'postal_code' => $this->input->post('postal_code'),
				'birthdate' => $this->input->post('birthdate'),
				'gender' => $this->input->post('inlineRadioOptions'),
				'info' => $this->input->post('info')
			);

			$insert_data = $this->claims_model->insert_client($client_data);

			if($insert_data == true){
				$validator['success'] = true;
				$validator['messages'] = 'Success. Page refreshing...';
				$validator['link'] = 'client_profile';
			}else{

				$validator['success'] = false;
				$validator['messages'] = 'Something went wrong. Please contact the administrator';	
			}
		}

			echo json_encode($validator);
	}

	public function client_profile($account_no){
		$this->check_auth('borrowers');
		$result = $this->claims_model->profile($account_no);

		if(!is_null($result)){
			$client['profile'] = array(
				'account_no' => $result['account_no'],
				'prof-img' => $result['profile_img'],
				'email' => $result['email'],
				'number1' => $result['number1'],
				'number2' => $result['number2'],
				'birthdate' => $result['birthdate'],
				'gender' => $result['gender'],
				'info' => $result['added_info'],
				'status' => $result['status'],
				'purok' => $result['purok_no'],
				'barangay' => $result['barangay'],
				'city' => $result['city'],
				'province' => $result['province'],
				'country' => $result['country'],
				'postal_code' => $result['postal_code'],
				'fname' => $result['firstname'],
				'mname' => $result['middlename'],
				'lname' => $result['lastname']
			);

			$this->load->view('templates/header');
			$this->load->view('profile', $client);
			$this->load->view('templates/footer');

		}else{
			redirect(base_url('error404'));
		}

		
	}
	public function account_query(){

		$data = array('success' => false, 'name' => array(), 'address' => array(), 'email' => array(), 'sim1' => array(), 'sim2' => array());

		$result = $this->claims_model->account_query($_POST['account_no']);

		if($result){

			$data['name'] = $result['firstname'].' '.$result['middlename'].' '.$result['lastname'];
			$data['address'] = 'Purok '.$result['purok_no'].', '.$result['barangay'].', '.$result['city'].', '.$result['province'].', '.$result['postal_code'];
			$data['email'] = $result['email'];
			$data['sim1'] = $result['number1'];
			$data['sim2'] = $result['number2'];
			$data['success'] = true;

		}else{
			$data['success'] = false;
		}

		echo json_encode($data);
	}

	public function create_loan(){

		$validator = array('success' => false, 'messages' => array());

		$data = $this->input->post();
		$data1 = $this->input->post();

		$insert_data = $this->claims_model->insert_loan($data);

		if($insert_data){

			$inser_co = $this->claims_model->insert_co_maker($data1);

			$validator['success'] = true;
			$validator['messages'] = 'Loan successfully registered. The page will reload.';
		}else{
			$validator['success'] = false;
			$validator['messages'] = 'Sorry';
		}

		echo json_encode($validator);
	}

	public function loan($id=""){
		$this->check_auth('borrowers');

		//get last loan_no of client
		$loan_no = $this->claims_model->get_loan_no();

		

		if(is_null($loan_no)){
			$loan['loan_no'] = 100;

			$this->load->view('templates/header');
			$this->load->view('loan', $loan);
			$this->load->view('templates/footer');
		}else{
			$loan['loan_no'] = substr($loan_no['loan_no'], 1);

			$this->load->view('templates/header');
			$this->load->view('loan', $loan);
			$this->load->view('templates/footer');
		}
		

	}

	public function delete_clients(){
		$result = $this->claims_model->delete_clients($_POST['id']);
		if($result){
			echo "Success. Redirecting to add clients form...";
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
