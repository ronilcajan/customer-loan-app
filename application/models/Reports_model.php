<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function get_all_clients(){
    	$this->db->select('*');
    	$this->db->from('clients');
    	$this->db->join('names', 'clients.account_no=names.account_no');
    	$this->db->join('address','clients.account_no=address.account_no');
    	$query = $this->db->get();
    	
    	return $query->result_array();
    }

    public function get_all_loans(){
    	$this->db->select('*, loan.status as loan_status');
    	$this->db->from('loan');
    	$this->db->join('clients', 'clients.account_no=loan.account_no');
    	$this->db->join('names', 'clients.account_no=names.account_no');
    	$this->db->join('approved_loans', 'approved_loans.loan_no=loan.loan_no');
    	$query = $this->db->get();
    	
    	return $query->result_array();
    }
    public function get_all_payments(){
        $this->db->select('*');
        $this->db->from('loan');
        $this->db->join('clients', 'clients.account_no=loan.account_no');
        $this->db->join('names', 'clients.account_no=names.account_no');
        $this->db->join('payment_transactions', 'payment_transactions.loan_no=loan.loan_no');
        $query = $this->db->get();
        $result = $query->result_array();

        if(count($result) > 0){
            return $result;
        }else{
            return null;
        }
    }
}
?>
