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

	function send_email($name,$user_email,$amount,$b_name){
			
		//setup SMTP configurion
		$config = Array(    
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'rf.servicing.corporation@gmail.com',
		  'smtp_pass' => 'CORPOration101',
		  'mailtype' => 'html',
		  'charset' => 'utf-8',
		  'TLS/SSL' => 'required'
		);

		$this->load->library('email', $config); // Load email template

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$this->email->from('rf.servicing.corporation@gmail.com', 'RFS Corporation');

		$data = array(
			'name' => $name,
			'amount' => $amount,
			'business' => $b_name
        );

		$subject = "RFSC Loan application";

		$this->email->to($user_email); // replace it with receiver email id
		$this->email->subject($subject); // replace it with email subject
		$message = $this->load->view('templates/email_template.php',$data,TRUE);

		$this->email->message($message); 
		$this->email->send();

	}


	public function create_loan(){

		$validator = array('success' => false, 'messages' => array(), 'email' => array());
		$full_name = $this->input->post('full_name');
		$email = $this->input->post('email');
		$amount = $this->input->post('loan_amount');
		$business = $this->input->post('b_name');
		$email_notif = $this->input->post('email_notif');
		$account_no = $this->input->post('account_no');
		
		$data = $this->input->post();
		$data1 = $this->input->post();

		$insert_data = $this->claims_model->insert_loan($data);

		if($insert_data){

			$this->claims_model->insert_co_maker($data1);

			if($email_notif == 'yes'){

				$sendmail = $this->send_email($full_name,$email,$amount,$business);

			}

			$validator['success'] = true;
			$validator['messages'] = 'Loan successfully registered.';

			$this->claims_model->update_borrowers($account_no);
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

		$loan['verifier'] = $this->claims_model->get_verifier();
		$loan['collector'] = $this->claims_model->get_collector();

		if($id!=''){
			$loan['account_no'] = $id;
		}

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
