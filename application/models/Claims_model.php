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

        $query = $this->db->get_where('user_login', $userdata);
        $result = $query->result_array();

        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

}
