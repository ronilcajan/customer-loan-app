<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowers extends CI_Controller {
	public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect(base_url());
        }
    }

	public function create_borrowers(){

		$this->check_auth('create_borrowers');

		$title['title'] = "RFSC-Create Borrowers";

		//get last account_no of client
		$account_no = $this->borrowers_model->get_account_id();

		if(is_null($account_no)){

			$clients['acc_no'] = 1000;

			$this->load->view('templates/header',$title);
			$this->load->view('borrowers/create_borrowers', $clients);
			$this->load->view('templates/footer');

		}else{
			$clients['acc_no'] = array('account_no' => $account_no['account_no']);
			
			$this->load->view('templates/header',$title);
			$this->load->view('borrowers/create_borrowers', $clients);
			$this->load->view('templates/footer');
		}
	}

	public function new_borrowers(){

		$this->check_auth('create_borrowers');

		$title['title'] = "RFSC-New Borrowers";

		$clients['new_clients'] = $this->borrowers_model->get_new_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('borrowers/new_borrowers', $clients);
		$this->load->view('templates/footer');
	}
	public function loan_applicant(){

		$title['title'] = "RFSC-Loan Applicants";

		$this->check_auth('loan_applicant');

		$clients['verify'] = $this->borrowers_model->get_verified_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('borrowers/loan_applicants', $clients);
		$this->load->view('templates/footer');
	}
	public function approved_borrowers(){

		$title['title'] = "RFSC-Approved Borrowers";

		$this->check_auth('approve_borrowers');

		$clients['approved'] = $this->borrowers_model->get_approved_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('borrowers/approve_borrowers', $clients);
		$this->load->view('templates/footer');
	}
	public function rejected_borrowers(){

		$title['title'] = "RFSC-Rejected Borrowers";

		$this->check_auth('rejected_borrowers');
		
		$clients['rejected'] = $this->borrowers_model->get_rejected_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('borrowers/rejected_borrowers', $clients);
		$this->load->view('templates/footer');
	}
	public function active_borrowers(){

		$title['title'] = "RFSC-Active Borrowers";

		$this->check_auth('active_borrowers');
		
		$clients['active'] = $this->borrowers_model->get_active_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('borrowers/active_borrowers', $clients);
		$this->load->view('templates/footer');
	}

	public function borrowers_profile($account_no){

		$this->check_auth('borrowers_profile');

		$result = $this->borrowers_model->get_profile($account_no);

		if(!is_null($result)){

			$business = $this->borrowers_model->get_profile_bname($account_no);

			if(!is_null($business)){
				$client['business'] = array('bname' => $business['business_name'],'baddress' => $business['business_address']);
			}

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

			$title['title'] = "Profile-".$result['firstname'].' '.$result['middlename'].' '.$result['lastname'];

			$this->load->view('templates/header',$title);
			$this->load->view('borrowers/profile', $client);
			$this->load->view('templates/footer');

		}else{
			redirect(base_url('error404'));
		}	
	}

	public function register_borrowers()
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

			$insert_data = $this->borrowers_model->insert_client($client_data);

			if($insert_data == true){
				$validator['success'] = true;
				$validator['messages'] = 'Successfully added!';
			}else{

				$validator['success'] = false;
				$validator['messages'] = 'Something went wrong. Please contact the administrator';	
			}
		}

			echo json_encode($validator);
	}

	function send_approve_email($name,$user_email,$amount,$b_name){
			
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

		$subject = "RFSC Loan application approved";

		$this->email->to($user_email); // replace it with receiver email id
		$this->email->subject($subject); // replace it with email subject
		$message = $this->load->view('templates/approve_email.php',$data,TRUE);

		$this->email->message($message); 
		$this->email->send();

	}

	public function approve_loan(){

		$result = $this->borrowers_model->approve_loan($_POST['id']);

		if($result){

			$query = $this->borrowers_model->get_loan_details($_POST['id']);
			if($query){

				$name = $query['firstname'].' '.$query['middlename'].' '.$query['lastname'];
				$email = $query['email'];
				$amount = $query['loan_amount'];
				$b_name = $query['business_name'];

				$send_approve_email = $this->send_approve_email($name, $email, $amount, $b_name);
				
			}

			echo "Loan approved";
		}else{
			echo "False";
		}
	}

	public function reject_loan(){
		$result = $this->borrowers_model->reject_loan($_POST['id'],$_POST['reason']);
		if($result){
			echo "Loan rejected";
		}else{
			echo "False";
		}
		
	}


	public function delete_clients(){
		$result = $this->borrowers_model->delete_clients($_POST['id']);
		if($result){
			echo "Client data has been deleted";
		}else{
			echo "False";
		}
		
	}

	public function remove_loan(){
		$result = $this->borrowers_model->remove_loan($_POST['id']);
		if($result){
			echo "Loan remove";
		}else{
			echo "False";
		}
		
	}

	public function reapply_loan(){
		$result = $this->borrowers_model->reapply_loan($_POST['id']);
		if($result){
			echo "Loan successfully re-applied.";
		}else{
			echo "False";
		}
		
	}
	public function cash_recieve(){

		$result = $this->borrowers_model->cash_recieve($_POST['id']);
		if($result){
			echo "Cash released!";
		}else{
			echo "False";
		}
		
	}
	


}