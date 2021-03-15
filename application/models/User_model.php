<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_customer_info($data)
    {
        $this->db->insert('customer_full_info', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insert_user_tbl($user_data)
    {
        $this->db->insert('users', $user_data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insert_user_group_tbl($user_group)
    {
        $this->db->insert('users_groups', $user_group);
    }

    public function login_info_insert($login_info)
    {
        $this->db->insert('login_attempts', $login_info);        
    }

    public function get_user_info($user_id)
    {
        $this->db->where('udc_list_auto_p_iidd', $user_id);
        $this->db->join('user_s', 'user_s.user_full_tbl_id = customer_full_info.udc_list_auto_p_iidd', 'left');
        $sql = $this->db->get('customer_full_info');
        return $sql->row();
    }
}