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

			$result['loan'] = $this->payments_model->get_loan_details($loan_no);

			if(!is_null($result)){

				$title['title'] = "RFSC-Loan Details";

				$this->load->view('templates/header',$title);
				$this->load->view('payments/loan_payments', $result);
				$this->load->view('templates/footer');

			}else{
				redirect(base_url('error404'));
			}	
		}


	}
?>