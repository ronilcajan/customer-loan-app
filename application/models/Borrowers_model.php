<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowers_model extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function insert_client($data){

        if($data['client_img'] == ""){
            $client_data = array(
                'account_no' => $data['account_no'],
                'profile_img' => $data['client_img'],
                'email' => $data['email'],
                'number1' => $data['number1'],
                'number2' => $data['number2'],
                'birthdate' => $data['birthdate'],
                'gender' => $data['gender'],
                'added_info' => $data['info'],
            );
        }else{
             $client_data = array(
                'account_no' => $data['account_no'],
                'profile_img' => $data['client_img'],
                'email' => $data['email'],
                'number1' => $data['number1'],
                'number2' => $data['number2'],
                'birthdate' => $data['birthdate'],
                'gender' => $data['gender'],
                'added_info' => $data['info'],
            );
        }
       
        $client_name = array(
            'account_no' => $data['account_no'],
            'firstname' => $data['gname'],
            'middlename' => $data['mname'],
            'lastname' => $data['lname'],
        );
        $client_address = array(
            'account_no' => $data['account_no'],
            'purok_no' => $data['purok_no'],
            'barangay' => $data['barangay'],
            'city' => $data['city'],
            'province' => $data['province'],
            'postal_code' => $data['postal_code'],
        );

        $this->db->insert('clients',$client_data);

        $this->db->insert('names',$client_name);

        $this->db->insert('address',$client_address);

        return $this->db->affected_rows();
    }

    public function update_profile($data){

        if(empty($data['img'])){

            $client_data = array(
                'email' => $data['email'],
                'number1' => $data['number1'],
                'number2' => $data['number2'],
                'birthdate' => $data['bday'],
                'gender' => $data['gender'],
                'added_info' => $data['info'],
            );
        }else{
            $client_data = array(
                'profile_img' => $data['img'],
                'email' => $data['email'],
                'number1' => $data['number1'],
                'number2' => $data['number2'],
                'birthdate' => $data['bday'],
                'gender' => $data['gender'],
                'added_info' => $data['info'],
            );
        }

        $this->db->where('account_no', $data['account_no']);
        $this->db->update('clients', $client_data);

        return $this->db->affected_rows();
    }

    public function update_name($data){

            $client_name = array(
                'firstname' => $data['fname'],
                'middlename' => $data['mname'],
                'lastname' => $data['lname'],
            );    
        
        $this->db->where('account_no', $data['account_no']);
        $this->db->update('names', $client_name);

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

    public function get_new_clients(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->where('status', 'New');
        $this->db->or_where('status', 'Verified');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_active_clients(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('loan', 'loan.account_no = clients.account_no');
        $this->db->where('loan.status', 'Active');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_profile($data){

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

    public function get_profile_bname($data){

        $this->db->where('debtor_business.account_no', $data);

        $query = $this->db->get('debtor_business');

        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function get_co_maker($data){
        $this->db->where('co_maker.account_no', $data);

        $query = $this->db->get('co_maker');

        $result = $query->result_array();
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    }

     public function get_loan($data){
        $this->db->select('*, loan.status as loan_stat');
        $this->db->from('loan');
        $this->db->join('approved_loans', 'approved_loans.loan_no=loan.loan_no');
        $this->db->where('loan.account_no', $data);

        $query = $this->db->get();

        $result = $query->result_array();
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    }


    public function delete_clients($data){
        $this->db->where('account_no', $data);
        $this->db->delete('clients');
        return $this->db->affected_rows();
    }

}