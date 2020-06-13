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
	public function promissory($loan_no=""){

		$this->check_auth('approved_loans');

		$loan = $loan_no;

		if($loan != ''){

			$result['loan'] = $this->payments_model->get_loan_details($loan);

			if(!is_null($result)){

				$title['title'] = "RFSC-Promissory Note";

				$result['cmaker'] = $this->borrowers_model->get_co_maker($result['loan']['account_no']);

				$this->load->view('templates/header',$title);
				$this->load->view('loan/promissory', $result);
				$this->load->view('templates/footer');

			}else{
				redirect(base_url('error404'));
			}

		}
	}

	public function paid_loans(){
		$title['title'] = "RFSC-Paid Loans";

		$this->check_auth('paid_loans');

		$clients['paid'] = $this->loan_model->get_paid_loan();

		$this->load->view('templates/header',$title);
		$this->load->view('loan/paid_loans', $clients);
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

		$validator = array('success' => false, 'messages' => array() , 'email' => false, 'sim_1' => false, 'sim_2' => false, 'sim1' => array(), 'sim2' => array());
		$full_name = $this->input->post('full_name');
		$email = $this->input->post('email');
		$amount = $this->input->post('loan_amount');
		$business = $this->input->post('b_name');
		$email_notif = $this->input->post('email_notif');
		$sim1_notif = $this->input->post('sim1_notif');
		$sim2_notif = $this->input->post('sim2_notif');
		$sim1 = $this->input->post('sim1');
		$sim2 = $this->input->post('sim2');
		$account_no = $this->input->post('account_no');
		
		$data = $this->input->post();
		$data1 = $this->input->post();

		$insert_data = $this->loan_model->insert_loan($data);

		if($insert_data){

			$this->loan_model->insert_co_maker($data1);

			if($email_notif == 'yes'){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					
					$subject = "RFSC Loan Application Verification";
					$template = "templates/email_template";

					$sendmail = $this->send_email($full_name,$email,$amount,$business,$subject,$template);

					$validator['messages'] = 'Loan successfully registered. Email notification sent!';
					$validator['email'] = true;
				}else{
					$validator['messages'] = 'Loan successfully registered!';
				}
			}

			$msg = "Hi there, This is to notify you that your loan application is approved. From RFS Corporation.";
			$apicode = "TR-RFSCO761275_H4IDW";

			if($sim1_notif == 'yes'){
				$send_sms1 = $this->itexmo($sim1, $msg, $apicode);

				if($send_sms1 == ''){

					$validator['sim1'] = "Something went wrong. Please contact developer";

				}elseif ($send_sms1 == 0) {

					$validator['sim1'] = "SMS sent successfully!";
					
				}else{
					$validator['sim1'] = "SMS not sent.";
				}

				$validator['sim_1'] = true;
			}

			if ($sim2_notif == 'yes') {
				$send_sms2 = $this->itexmo($sim2, $msg, $apicode);

				if($send_sms == ''){

					$validator['sim2'] = "Something went wrong. Please contact developer";

				}elseif ($send_sms == 0) {

					$validator['sim2'] = "SMS sent successfully!";

				}else{
					$validator['sim2'] = "SMS not sent.";
				}
				$validator['sim_2'] = true;
			}

			$this->loan_model->update_borrowers($account_no);
			$validator['success'] = true;
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

	function send_sms($num, $message, $apicode){
        
        $url = 'https://www.itextmo.com/php_api/api.php';

        $itextmo = array('1' => $num, '2' => $message, '3' => $apicode );

        $param = array(
        	'http' => array(
        		'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        		'method' => 'POST',
        		'content' => http_build_query($itextmo),
        	),
        );

        $context = stream_context_create($param);

        return file_get_contents($url, false, $context);

	}

	function itexmo($number,$message,$apicode){
			$passwd = '}%4$$m4ze{';
			$ch = curl_init();
			$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
			curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
			curl_setopt($ch, CURLOPT_POST, 1);
			 curl_setopt($ch, CURLOPT_POSTFIELDS, 
			          http_build_query($itexmo));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			return curl_exec ($ch);
			curl_close ($ch);
	}

	public function approve_loan(){

		$data = array('success' => false, 'email' => false, 'sim1' => array(), 'sim2' => array());

		$id = $this->input->post('id');
		$amount = $this->input->post('amount');

		$query = $this->loan_model->get_loan_details($id);

		if($query){

			$result = $this->loan_model->approve_loan($id, $amount);

			if($result){

				$name = $query['firstname'].' '.$query['middlename'].' '.$query['lastname'];
				$email = $query['email'];
				$amount = $query['loan_amount'];
				$b_name = $query['business_name'];
				$subject = "RFSC Loan Application Approval";
				$template = "templates/email_approval";

				$num = $query['number1'];
				$num1 = $query['number2'];
				$msg = "Hi there, This is to notify you that your loan application is approved. From RFS Corporation.";
				$apicode = "TR-RFSCO761275_H4IDW";

				if(filter_var($email, FILTER_VALIDATE_EMAIL)){

					$sendmail = $this->send_email($name,$email,$amount,$b_name,$subject,$template);	

					$data['email'] = true;
				}

				$send_sms = $this->itexmo($num, $msg, $apicode);
				$send_sms1 = $this->itexmo($num1, $msg, $apicode);


				if($send_sms == ''){

					$data['sim1'] = "Something went wrong. Please contact developer";

				}elseif ($send_sms == 0) {

					$data['sim1'] = "SMS sent successfully!";

				}else{
					$data['sim1'] = "SMS not sent.";
				}

				if($send_sms1 == ''){

					$data['sim2'] = "Something went wrong. Please contact developer";

				}elseif ($send_sms1 == 0) {

					$data['sim2'] = "SMS sent successfully!";
					
				}else{
					$data['sim2'] = "SMS not sent.";
				}
			}

			$data['success'] =  true;

		}else{

			$data['success'] =  true;

		}

		echo json_encode($data);
	}

	public function reject_loan(){
		$result = $this->loan_model->reject_loan($this->input->post('id'),$this->input->post('reason'));
		if($result){
			echo "Loan rejected";
		}else{
			echo "False";
		}
	}

	public function remove_loan(){
		$result = $this->loan_model->remove_loan($this->input->post('id'));
		if($result){
			echo "Loan remove";
		}else{
			echo "False";
		}
		
	}
	public function cash_recieve(){

		$result = $this->loan_model->cash_recieve($this->input->post('id'));

		if($result){
			$this->loan_model->status_update($this->input->post('id'));
			echo "Cash released!";
		}else{
			echo "False";
		}
		
	}
	public function reapply_loan(){
		$result = $this->loan_model->reapply_loan($this->input->post('id'));
		if($result){
			echo "Loan successfully re-applied.";
		}else{
			echo "False";
		}
		
	}

}
?>
