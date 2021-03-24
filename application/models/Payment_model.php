<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function payment_added_info($user_id)
    {
        $this->db->select_sum('added_amount');
        $this->db->where('customer_id', $user_id);
        $sql = $this->db->get('payment_add');
        return $sql->row()->added_amount;
    }

    public function payment_cut_info($user_id)
    {
        $this->db->select_sum('cut_amount');
        $this->db->where('cust_id', $user_id);
        $sql = $this->db->get('payment_cut');
        return $sql->row()->cut_amount;
    }

    public function get_payment_system_list()
    {
        $sql = $this->db->get('payment_system_list');
        return $sql->result();
    }

    public function get_pending_payment($user)
    {
        $this->db->limit(5);
        $this->db->where('user_u_id', $user);
        $this->db->join('payment_system_list', 'payment_system_list.payment_list_id = payment_request_list.payment_system_idd', 'left');
        $sql = $this->db->get('payment_request_list');
        return $sql->result();
    }

    public function inser_payment_request_s($insert_data_ss)
    {
        $this->db->insert('payment_request_list', $insert_data_ss);        
    }

}

/* End of file Payment_model.php */