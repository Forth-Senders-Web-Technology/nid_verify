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

    public function get_pending_withdraw_payment($user_id)
    {
        $this->db->limit(10);
        $this->db->where('user_iddd', $user_id);
        $this->db->join('payment_system_list', 'payment_system_list.payment_list_id = withsraw_request.payment_list_iidddd', 'left');
        $sql = $this->db->get('withsraw_request');
        return $sql->result();
    }

    public function insert_payment_withdraw_request($insert_data)
    {
        $this->db->insert('withsraw_request', $insert_data);        
    }

    public function get_provider_amount_rate($service_p_iddd)
    {
        $this->db->where('services_idd', $service_p_iddd);
        $this->db->join('services_list_tbl', 'services_list_tbl.services_list_tbl_p_id = provider_rate.services_idd', 'left');
        $sql = $this->db->get('provider_rate');
        return $sql->row(); 
    }

    public function payment_added($inserts_array_datass)
    {
        $this->db->insert('payment_add', $inserts_array_datass);        
    }

    public function get_waiting_payments()
    {
        $this->db->where('status_present', 0);
        $this->db->join('payment_system_list', 'payment_system_list.payment_list_id = payment_request_list.payment_system_idd', 'left');
        $this->db->join('customer_full_info', 'customer_full_info.udc_list_auto_p_iidd = payment_request_list.user_u_id', 'left');
        $sql = $this->db->get('payment_request_list');
        return $sql->result();
    }

    public function payment_added_method($arr_data_for_db)
    {
        $this->db->insert('payment_add', $arr_data_for_db);
    }

    public function update_payment_request_opt($pay_request_id, $array_for_db)
    {
        $this->db->where('payment_request_list_idd', $pay_request_id);
        $this->db->update('payment_request_list', $array_for_db);
    }

    public function get_waiting_withdraw_amount()
    {
        $this->db->where('withdraw_check_status_s', 0);
        $this->db->join('payment_system_list', 'payment_system_list.payment_list_id = withsraw_request.payment_list_iidddd', 'left');
        $this->db->join('customer_full_info', 'customer_full_info.udc_list_auto_p_iidd = withsraw_request.user_iddd', 'left');
        $sql = $this->db->get('withsraw_request');
        return $sql->result();
    }

    public function approve_withdraw_amount_request($pay_request_id, $UpdateArrayData)
    {
        $this->db->where('withsraw_request_idd', $pay_request_id);
        $this->db->update('withsraw_request', $UpdateArrayData);
    }

    public function get_withdraw_requ_info_by_id($requ_idd)
    {
        $this->db->where('withsraw_request_idd', $requ_idd);
        $sql = $this->db->get('withsraw_request');
        return $sql->row();
    }

	public function all_user_payment_added_info()
	{
        $this->db->select_sum('added_amount');
        $sql = $this->db->get('payment_add');
        return $sql->row()->added_amount;
	}

	public function all_user_payment_cut_info()
	{
        $this->db->select_sum('cut_amount');
        $sql = $this->db->get('payment_cut');
        return $sql->row()->cut_amount;
	}

}

/* End of file Payment_model.php */
