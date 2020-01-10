<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {

	public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect(base_url());
        }
    }

    public function create_loan($id=""){

    	$this->check_auth('create_loan');

    	$title['title'] = "RFSC-Create Loan";

		//get last loan_no of client
		$loan_no = $this->loan_model->get_loan_no();

		$loan['verifier'] = $this->loan_model->get_verifier();
		$loan['collector'] = $this->loan_model->get_collector();

		if($id!=''){
			$loan['account_no'] = $id;
		}

		if(is_null($loan_no)){

			$loan['loan_no'] = 100;

			$this->load->view('templates/header',$title);
			$this->load->view('loan/create_loan', $loan);
			$this->load->view('templates/footer');
		}else{
			$loan['loan_no'] = substr($loan_no['loan_no'], 1);

			$this->load->view('templates/header',$title);
			$this->load->view('loan/create_loan', $loan);
			$this->load->view('templates/footer');
		}
    }

    public function new_loans(){

		$title['title'] = "RFSC-New Loans";

		$this->check_auth('new_loans');

		$clients['verify'] = $this->loan_model->get_verified_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('loan/new_loans', $clients);
		$this->load->view('templates/footer');
	}

	public function approved_loans(){

		$title['title'] = "RFSC-Approved Loans";

		$this->check_auth('approve_loans');

		$clients['approved'] = $this->loan_model->get_approved_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('loan/approved_loan', $clients);
		$this->load->view('templates/footer');
	}

	public function rejected_loans(){

		$title['title'] = "RFSC-Rejected Loans";

		$this->check_auth('rejected_loans');
		
		$clients['rejected'] = $this->loan_model->get_rejected_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('loan/rejected_loan', $clients);
		$this->load->view('templates/footer');
	}

    function send_email($name,$user_email,$amount,$b_name,$subject,$template){
			
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
		$this->email->from($template, 'RFS Corporation');

		$data = array(
			'name' => $name,
			'amount' => $amount,
			'business' => $b_name
        );

		$this->email->to($user_email); // replace it with receiver email id
		$this->email->subject($subject); // replace it with email subject
		$message = $this->load->view($template,$data,TRUE);

		$this->email->message($message); 
		$this->email->send();

	}

    public function insert_loan(){

		$validator = array('success' => false, 'messages' => array(), 'email' => array());
		$full_name = $this->input->post('full_name');
		$email = $this->input->post('email');
		$amount = $this->input->post('loan_amount');
		$business = $this->input->post('b_name');
		$email_notif = $this->input->post('email_notif');
		$account_no = $this->input->post('account_no');
		
		$data = $this->input->post();
		$data1 = $this->input->post();

		$insert_data = $this->loan_model->insert_loan($data);

		if($insert_data){

			$this->loan_model->insert_co_maker($data1);

			if($email_notif == 'yes'){

				$subject = "RFSC Loan Application Verification";
				$template = "templates/email_template";
				$sendmail = $this->send_email($full_name,$email,$amount,$business,$subject,$template);

			}

			$validator['success'] = true;
			$validator['messages'] = 'Loan successfully registered. Email notification sent!';

			$this->loan_model->update_borrowers($account_no);
		}else{
			$validator['success'] = false;
			$validator['messages'] = 'Sorry';
		}

		echo json_encode($validator);
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

	public function approve_loan(){

		$id = $this->input->post('id');

		$query = $this->loan_model->get_loan_details($id);

		if($query){

			$result = $this->loan_model->approve_loan($id);

			if($result){

				$name = $query['firstname'].' '.$query['middlename'].' '.$query['lastname'];
				$email = $query['email'];
				$amount = $query['loan_amount'];
				$b_name = $query['business_name'];
				$subject = "RFSC Loan Application Approval";
				$template = "templates/email_approval";

				$sendmail = $this->send_email($name,$email,$amount,$b_name,$subject,$template);	
			}

			echo "Loan approved. Email notification sent!";
		}else{
			echo "False";
		}
	}

	public function reject_loan(){
		$result = $this->loan_model->reject_loan($_POST['id'],$_POST['reason']);
		if($result){
			echo "Loan rejected";
		}else{
			echo "False";
		}
	}

	public function remove_loan(){
		$result = $this->loan_model->remove_loan($_POST['id']);
		if($result){
			echo "Loan remove";
		}else{
			echo "False";
		}
		
	}
	public function cash_recieve(){

		$result = $this->loan_model->cash_recieve($_POST['id']);
		if($result){
			echo "Cash released!";
		}else{
			echo "False";
		}
		
	}
	public function reapply_loan(){
		$result = $this->loan_model->reapply_loan($_POST['id']);
		if($result){
			echo "Loan successfully re-applied.";
		}else{
			echo "False";
		}
		
	}

}
?>
