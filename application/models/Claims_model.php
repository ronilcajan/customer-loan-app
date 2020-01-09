<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claims_model extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function login_user($data){

        $userdata = array(
            'username' => $data['username'],
            'password' => sha1($data['password'])
        );

        $query = $this->db->get_where('users', $userdata);
        $result = $query->result_array();

        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }



    public function update_borrowers($data){
        $this->db->set('status', 'Verified');
        $this->db->where('account_no', $data);
        $this->db->update('clients');
        return $this->db->affected_rows();
    }

    public function get_account_id(){
        $this->db->select('account_no');
        $this->db->from('clients');
        $this->db->order_by('account_no', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function get_loan_no(){
        $this->db->select('loan_no');
        $this->db->from('loan');
        $this->db->order_by('loan_no', 'DESC');

        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function get_verifier(){

        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('user_type', 'Loan Officer');

        $query = $this->db->get();

        $result = $query->result_array();

        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    
    }

    public function get_collector(){

        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('user_type', 'Collector');
        
        $query = $this->db->get();

        $result = $query->result_array();
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    
    }

    public function insert_loan($data){

        $loan = array(
            'loan_no' => $data['loan_no'],
            'account_no' => $data['account_no'],
            'area' => $data['area'],
            'loan_amount' => $data['loan_amount'],
            'interest' => $data['interest'],
            'collector' => $data['collector'],
            'verified' => $data['verifier']

        );

        $business = array(
            'business_name' => $data['b_name'],
            'business_address' => $data['b_address'],
            'loan_no' => $data['loan_no'],
            'account_no' => $data['account_no']
        );

        $this->db->insert('loan', $loan);
        $this->db->insert('debtor_business', $business);

        return $this->db->affected_rows();
            
    }

    public function insert_co_maker($data){

        for($i=0; $i<count($data['co_maker_name']); $i++){

            $co_data = array(
                'name' => $data['co_maker_name'][$i],
                'cedula_no' => $data['cedula'][$i],
                'date_issued' => $data['date_issued'][$i],
                'address_issued' => $data['adrs_issued'][$i],
                'loan_no' => $data['loan_no']
            );

            $this->db->insert('co_maker', $co_data);
        }

        return $this->db->affected_rows();
    }

    // public function get_new_clients(){
    //     $this->db->select('*');
    //     $this->db->from('clients');
    //     $this->db->join('address', 'clients.account_no = address.account_no');
    //     $this->db->join('names', 'clients.account_no = names.account_no');
    //     $this->db->where('status', 'New');
    //     $result = $this->db->get();

    //     return $result->result_array();
    // }

    // public function get_verified_clients(){
    //     $this->db->select('*');
    //     $this->db->from('clients');
    //     $this->db->join('address', 'clients.account_no = address.account_no');
    //     $this->db->join('names', 'clients.account_no = names.account_no');
    //     $this->db->join('loan', 'loan.account_no = clients.account_no');
    //     $this->db->where('loan.status', 'Waiting for approval');
    //     $result = $this->db->get();

    //     return $result->result_array();
    // }
    // public function get_rejected_clients(){
    //     $this->db->select('*');
    //     $this->db->from('clients');
    //     $this->db->join('address', 'clients.account_no = address.account_no');
    //     $this->db->join('names', 'clients.account_no = names.account_no');
    //     $this->db->join('loan', 'loan.account_no = clients.account_no');
    //     $this->db->where('loan.status', 'Rejected');
    //     $result = $this->db->get();

    //     return $result->result_array();
    // }

    

    public function account_query($data){

        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->where('clients.account_no', $data);

        $query = $this->db->get();
        $result = $query->result_array();
        
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }

    }

    

    
}
