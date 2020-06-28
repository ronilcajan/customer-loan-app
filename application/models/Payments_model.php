<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function get_loan_details($data){
        $sql = "SELECT *, loan.status as loan_stats FROM `loan` JOIN clients ON loan.account_no=clients.account_no JOIN names ON clients.account_no=names.account_no JOIN debtor_business ON debtor_business.loan_no=loan.loan_no JOIN address ON address.account_no = clients.account_no JOIN approved_loans on approved_loans.loan_no = loan.loan_no WHERE loan.loan_no= '$data' ";
        $query = $this->db->query($sql);

        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function payment_check($data){
        $sql = "SELECT * FROM `payment_transactions` WHERE loan_no = '$data' ORDER BY payment_no DESC LIMIT 1";
        $query = $this->db->query($sql);


        $result = $query->result_array();
        
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    }

    public function insert_payment($data, $payment_no){
        $loan_no = $data['loan_no'];

        if(isset($data['total_pay'])){

            $payment = array(
                'loan_no' => $loan_no,
                'date' => date('Y-m-d'),
                'amount' => $data['total_pay'],
                'payment_no' => $payment_no,
                'notes' => 'Penalty added'
            );
            $this->db->insert('payment_transactions', $payment);

        }else{
            $payment = array(
                'loan_no' => $loan_no,
                'date' => date('Y-m-d'),
                'amount' => $data['daily_payment'],
                'payment_no' => $payment_no,
                'notes' => 'Daily payment'
            );
            $this->db->insert('payment_transactions', $payment);
        }

        return $this->db->affected_rows();
        
    }

    public function get_payment_first_month($data){

        $sql = "SELECT * FROM `payment_transactions` WHERE loan_no = '$data' AND payment_no BETWEEN 1 AND 30";

        $query = $this->db->query($sql);

        $result = $query->result_array();
        if(count($result) > 0){
            return $result;
        }else{
            return null;
        }
    }
    public function get_payment_second_month($data){
        $sql = "SELECT * FROM `payment_transactions` WHERE loan_no = '$data' AND payment_no BETWEEN 31 AND 60";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        if(count($result) > 0){
            return $result;
        }else{
            return null;
        }
    }

    public function paid($data){
        $this->db->set('status', 'Paid');
        $this->db->where('loan_no', $data);
        $this->db->update('approved_loans');

        $this->db->set('status', 'Paid');
        $this->db->where('loan_no', $data);
        $this->db->update('loan');
        return $this->db->affected_rows();
    }

}
?>