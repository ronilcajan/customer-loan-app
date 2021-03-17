<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	
	public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect(base_url());
        }
    }


    public function all_reports(){

    	$title['title'] = "RFSC - Reports";

        $data['clients'] = $this->reports_model->get_all_clients();
        $data['loans'] = $this->reports_model->get_all_loans();
        $data['payments'] = $this->reports_model->get_all_payments();

    	$this->load->view('templates/header', $title);
    	$this->load->view('reports/all_reports', $data);
    	
    }

    

}
?>