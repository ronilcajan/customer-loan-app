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

				$amount = intval($result['loan']['daily_payment']);
		        $int = $amount * 0.01;
		        $amnt_int = $amount + $int;

		        $result['penalty'] = $amnt_int;

				$title['title'] = "RFSC-Loan Details";

				$result['first_mnth'] = $this->payments_model->get_payment_first_month($result['loan']['loan_no']);
				$result['second_mnth'] = $this->payments_model->get_payment_second_month($result['loan']['loan_no']);

				$this->load->view('templates/header',$title);
				$this->load->view('payments/loan_payments', $result);
				$this->load->view('templates/footer');

			}else{
				redirect(base_url('error404'));
			}

		}else{
			$title['title'] = "RFSC-Search Loans";

			$this->load->view('templates/header',$title);
			$this->load->view('payments/loan_search');
			$this->load->view('templates/footer');
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

		$result = $this->payments_model->insert_payment($data);

		if($result){
			$validator['success'] = true;
			$validator['message'] = "Payment successfull!";

		}else{
			$validator['success'] = false;
			$validator['message'] = "Payment error!";
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