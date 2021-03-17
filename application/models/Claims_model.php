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

    public function get_num_borrowers(){
        $query = $this->db->get('clients');
        $result = $query->num_rows();
        return $result;
    }

    public function get_sum_payments(){

        $this->db->select('SUM(amount) as amnt');
        $this->db->from('payment_transactions');
        $this->db->where('date', date("Y-m-d"));
        $this->db->group_by('date');
        $query = $this->db->get();
        $result = $query->result_array();

        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function get_actv_borrowers(){
        $this->db->where('status', 'Active');
        $query = $this->db->get('loan');
        $result = $query->num_rows();
        return $result;
    }

    public function get_csh_borrowers(){
        $this->db->where('status', 'Approved');
        $query = $this->db->get('loan');
        $result = $query->num_rows();
        return $result;
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

    public function get_staff(){
        $this->db->select('*');
        $this->db->from('staff');
        $query = $this->db->get();
        
        $result = $query->result_array();
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    }   

    public function get_due_loan(){
        $this->db->where('loan.loan_no = approved_loans.loan_no');
        $this->db->where('approved_loans.status = "new"');
        $this->db->where('YEAR(CURRENT_DATE) = YEAR(approved_loans.due_date)');
        $this->db->where('MONTH(CURRENT_DATE) = MONTH(approved_loans.due_date)');

        $result = $this->db->get('approved_loans,loan');

        return $result->result_array();
    }


    public function get_user_profile($data){
        $this->db->select('*, users.username as user');
        $this->db->from('users');
        $this->db->join('staff', 'users.username=staff.username');
        $this->db->where('staff.username', $data);
        $query = $this->db->get();
        
        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }   

    public function remove_staff($data){

        $this->db->where('username', $data);
        $this->db->delete('staff');
    
        return $this->db->affected_rows();
    }

    public function insert_staff($data){
        $staff = array('username' => $data['username'], 'password' => sha1($data['password']), 'user_type' => $data['position'],);

        $this->db->insert('users', $staff);

        return $this->db->affected_rows();
    }

    public function insert_new_staff($data){
        $userdata = array(
            'username' => $data['username'],
            'firstname' => $data['name'],
            'address' => $data['address'],
            'number' => $data['number'],
            'email' => $data['email'],
            'position' => $data['position']
             );
        $this->db->insert('staff', $userdata);

        return $this->db->affected_rows();
    }   

    public function check_staff($data){

        $this->db->where('username', $data);
        $query = $this->db->get('users');
        $result = $query->result_array();
        
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    }
    public function create_staff($data){
        $userdata = array(
            'username' => $this->session->userdata('username'),
            'firstname' => $data['fname'],
            'middlename' => $data['mname'],
            'lastname' => $data['lname'],
            'number' => $data['num'],
            'address' => $data['address'].','.$data['city'].',Philippines,'.$data['postal'],
            'email' => $data['email'],
            'position' => $data['position'],
            'bio' => $data['bio']
        );

        $this->db->insert('staff', $userdata);

        return $this->db->affected_rows();
    }

    public function update_my_profile($data){
        if($data['img'] == ""){
            $userdata = array(
                'username' => $this->session->userdata('username'),
                'firstname' => $data['fname'],
                'middlename' => $data['mname'],
                'lastname' => $data['lname'],
                'number' => $data['num'],
                'address' => $data['address'],
                'email' => $data['email'],
                'bio' => $data['bio']
            );
        }else{
            $userdata = array(
                'username' => $this->session->userdata('username'),
                'firstname' => $data['fname'],
                'middlename' => $data['mname'],
                'lastname' => $data['lname'],
                'number' => $data['num'],
                'address' => $data['address'],
                'email' => $data['email'],
                'bio' => $data['bio'],
                'profile_img' => $data['img']
            );
        }

        $this->db->update('staff', $userdata);

        return $this->db->affected_rows();

    }
    public function create_task($task){

        $data = array(
            'description' => $task['task'],
            'username' => $this->session->userdata('username')
        );
        
        $this->db->insert('task', $data);
        return $this->db->affected_rows();
    }

    public function end_task($task){

        $data = array(
            'status' => "Doned"
        );
        
        $this->db->where('task_id', $task['id']);
        $this->db->update('task', $data);
        return $this->db->affected_rows();
    }

    public function update_task($task){

        $data = array(
            'description' => $task['description']
        );
        
        $this->db->where('task_id', $task['id']);
        $this->db->update('task', $data);
        return $this->db->affected_rows();
    }

    public function remove_task($task){
        
        $this->db->where('task_id', $task['id']);
        $this->db->delete('task');
        return $this->db->affected_rows();
    }

    public function get_my_task($data){
        $this->db->where('username', $data);
        $this->db->order_by('status', 'DESC');
        $query = $this->db->get('task');
        $result = $query->result_array();
        
        if(count($result) >0){
            return $result;
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

    public function change_pass($data){

        $this->db->set('password', sha1($data['new_pass']));
        $this->db->where('username', $data['username']);
        $this->db->update('users');
        return $this->db->affected_rows();

    }

    

    
}
