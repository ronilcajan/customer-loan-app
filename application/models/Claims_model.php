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
        $this->db->group_by('clients.account_no');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function profile($data){

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

    public function delete_clients($data){
        $this->db->where('account_no', $data);
        $this->db->delete('clients');
        return $this->db->affected_rows();
    }
}
