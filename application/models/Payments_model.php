<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function get_loan_details($data){
        $sql = "SELECT * FROM `loan` JOIN clients ON loan.account_no=clients.account_no JOIN names ON clients.account_no=names.account_no JOIN debtor_business ON debtor_business.loan_no=loan.loan_no JOIN address ON address.account_no = clients.account_no WHERE loan.loan_no= '$data' ";
        $query = $this->db->query($sql);

        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

}
?>