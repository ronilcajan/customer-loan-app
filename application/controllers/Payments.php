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

		if($loan_no != ''){

			$result['loan'] = $this->payments_model->get_loan_details($loan_no);

			if(!is_null($result)){

				$title['title'] = "RFSC-Loan Details";

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


	}
?>