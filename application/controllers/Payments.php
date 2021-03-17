<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {
	
	public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect(base_url());
        }
    }

	public function loan_details($loan_no=""){

		$this->check_auth('borrowers_profile');

		$loan = $loan_no;

		if($loan != ''){

			$result['loan'] = $this->payments_model->get_loan_details($loan);
			

			if(!is_null($result)){
				$result['pny'] = $this->payments_model->payment_check($loan);

				$amount = intval($result['loan']['daily_payment']);
		        $int = $amount * 0.01;
		        $amnt_int = $amount + $int;

		        if(!is_null($result['pny'])){
		        	$d = 0;
		        	if(!empty($result['pny'][0]['date'])){
		        		$d = $result['pny'][0]['date'];
		        	}
		        	$now = time();
	                $date = strtotime($d);
	                $datediff = $now - $date;

	                $payment_no = round($datediff / (60 * 60 * 24));

			        $result['penalty'] = $amnt_int*$payment_no;
		        }
		        

				$title['title'] = "RFSC-Loan Details";

				$result['first_mnth'] = $this->payments_model->get_payment_first_month($result['loan']['loan_no']);
				$result['second_mnth'] = $this->payments_model->get_payment_second_month($result['loan']['loan_no']);
				$this->load->view('templates/header',$title);
				$this->load->view('payments/loan_payments', $result);
				

			}else{
				redirect(base_url('error404'));
			}

		}else{
			$title['title'] = "RFSC-Search Loans";

			$this->load->view('templates/header',$title);
			$this->load->view('payments/loan_search');
			
		}
	}

	public function search_loan(){
		$validator = array('success' => false, 'loan' => array());

		$data = $this->input->post('loan_no');

		$result = $this->payments_model->get_loan_details($data);

		if(!is_null($result)){
			$validator['success'] = true;

			$validator['loan'] = array(
				'loan_no' => $result['loan_no'],
				'name' => $result['firstname'].' '.$result['middlename'].' '.$result['lastname'],
				'amount' => $result['loan_amount'],
				'date' => $result['date_approved']
			);

		}else{

			$validator['success'] = false;
			$validator['loan'] = "Loan number not found. Please check the number carefully!";
		}

		echo json_encode($validator);
	}

	public function pay_loan(){
		$validator = array('success' => false, 'message' => array());

		$data = $this->input->post();

		$check['pny'] = $this->payments_model->payment_check($data['loan_no']);

		if(empty($check['pny'][0]['payment_no'])){

			$payment_no = 1;

			$result = $this->payments_model->insert_payment($data, $payment_no);

			if($result){
				$validator['success'] = true;
				$validator['message'] = "Payment successfull!";

			}else{
				$validator['success'] = false;
				$validator['message'] = "Payment error!";
			}
		}else{

			$now = time();
			$date = strtotime($check['pny'][0]['date']);
			$datediff = $now - $date;

			$payment_no = round($datediff / (60 * 60 * 24)) + $check['pny'][0]['payment_no'];

			$result = $this->payments_model->insert_payment($data, $payment_no);
			if($result){
				$validator['success'] = true;
				$validator['message'] = "Payment successfull!";

			}else{
				$validator['success'] = false;
				$validator['message'] = "Payment error!";
			}
		}

			

		echo json_encode($validator);
	}

	public function fully_paid(){
		$data = array('success' => false, 'message' => array());

		$result = $this->payments_model->paid($this->input->post('loan_no'));

		if($result){

			$data['success'] = true;
			$data['message'] = "This loan is fully paid!";

		}else{
			$data['success'] = false;
			$data['message'] = "This loan is not fully paid!";
		}

		echo json_encode($data);
	}


	}
?>