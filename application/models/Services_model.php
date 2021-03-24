<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getNID_requ($user_id, $select_date, $service_id_s)
    {
        $this->db->where('entry_date', $select_date);
        $this->db->where('services_id', $service_id_s);
        $this->db->where('user_iddd', $user_id);
        $sql = $this->db->get('services_request_tbl');
        return $sql->result(); 
    }

    public function get_services_list($service_s_idd, $user_group_id)
    {
        $this->db->where('service_s_iid', $service_s_idd);
        $this->db->where('user_group_uniq_idd', $user_group_id);
        $sql = $this->db->get('service_rate_group');
        return $sql->row(); 
    }

    public function insert_this_services_cost($data_arr)
    {
        $this->db->insert('payment_cut', $data_arr);    
        $id = $this->db->insert_id();
        return $id;    
    }

    public function insert_services_data($insert_data_arr)
    {
        $this->db->insert('services_request_tbl', $insert_data_arr);  
    }

    public function get_this_user_datewise_services_info($user_id, $this_date)
    {
        $this->db->where('entry_date', $this_date);
        $this->db->where('user_iddd', $user_id);
        $sql = $this->db->get('services_request_tbl');
        return $sql->result(); 
    }
}

/* End of file Services_model.php */
