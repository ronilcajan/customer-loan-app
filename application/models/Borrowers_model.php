<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowers_model extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function insert_client($data){
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

    public function get_verified_clients(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('loan', 'loan.account_no = clients.account_no');
        $this->db->join('debtor_business', 'loan.loan_no = debtor_business.loan_no');
        $this->db->where('loan.status', 'Waiting for approval');
        $this->db->or_where('loan.status', 'Re-applied loan');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_rejected_clients(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('loan', 'loan.account_no = clients.account_no');
        $this->db->join('debtor_business', 'loan.loan_no = debtor_business.loan_no');
        $this->db->where('loan.status', 'Rejected');
        $result = $this->db->get();

        return $result->result_array();
    }
    
    public function get_approved_clients(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('loan', 'loan.account_no = clients.account_no');
        $this->db->where('loan.status', 'Approved');
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

    public function approve_loan($data){
        
        $this->db->set('status', "Approved");
        $this->db->set('approved', $this->session->userdata('username'));
        $this->db->where('loan_no', $data);
        $this->db->update('loan');
        return $this->db->affected_rows();
    }

    public function get_loan_details($data){
        $this->db->select('*');
        $this->db->from('loan');
        $this->db->join('clients', 'client.account_no=loan.loan_no');
        $this->db->join('names', 'names.account_no=names.account_no');
        $this->db->join('debtor_business', 'debtor_business.loan_no=loan.loan_no');
        $this->db->where('loan.loan_no', $data);
        $this->db->group_by('loan.loan_no');

        $query = $this->db->get();

        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }

    }

    public function remove_loan($data){

        $this->db->where('loan_no', $data);
        $this->db->delete('loan');
    
        return $this->db->affected_rows();
    }

    public function reject_loan($data, $data1){
        if(empty($data1)){
            $data1 = "No reason given";
        }
        $this->db->set('reason', $data1);
        $this->db->set('status', "Rejected");
        $this->db->set('approved', $this->session->userdata('username'));
        $this->db->where('loan_no', $data);
        $this->db->update('loan');
        return $this->db->affected_rows();
    }

    public function reapply_loan($data){
        $this->db->set('reason', null);
        $this->db->set('status', "Re-applied loan");
        $this->db->set('approved', null);
        $this->db->where('loan_no', $data);
        $this->db->update('loan');
        return $this->db->affected_rows();
    }

    public function delete_clients($data){
        $this->db->where('account_no', $data);
        $this->db->delete('clients');
        return $this->db->affected_rows();
    }

    public function cash_recieve($data){
        $this->db->set('status', "Active");
        $this->db->where('loan_no', $data);
        $this->db->update('loan');
        return $this->db->affected_rows();
    }


}