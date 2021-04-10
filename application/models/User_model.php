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
        $this->db->join('users', 'users.user_full_tbl_id = customer_full_info.udc_list_auto_p_iidd', 'left');
        $this->db->join('users_groups', 'users_groups.user_id = users.id', 'left');
        $this->db->join('groups', 'groups.id = users_groups.group_id', 'left');
        $sql = $this->db->get('customer_full_info');
        return $sql->row();
    }

    public function update_user_info($insert_data_array, $user_a_id)
    {
        $this->db->where('id', $user_a_id);
        $this->db->update('users', $insert_data_array);
    }

    public function update_customer_info($update_customer_info, $customer_id)
    {
        $this->db->where('udc_list_auto_p_iidd', $customer_id);
        $this->db->update('customer_full_info', $update_customer_info);
    }

    public function get_waiting_users()
    {
        $this->db->where('activity', 0);
        $this->db->where('approved_user_idd', NULL);
        $this->db->join('users', 'users.user_full_tbl_id = customer_full_info.udc_list_auto_p_iidd', 'left');
        $this->db->join('div_list', 'div_list.div_id = customer_full_info.div_a_iddd', 'left');
        $this->db->join('dist_list', 'dist_list.dist_id = customer_full_info.dist_a_iddd', 'left');
        $this->db->join('up_list', 'up_list.up_id = customer_full_info.up_a_iddd', 'left');
        $this->db->join('un_list', 'un_list.un_id = customer_full_info.un_a_iddd', 'left');
        $sql = $this->db->get('customer_full_info');
        return $sql->result();
    }

    public function approve_customer_by_id($clicked_user_idd, $element_array)
    {
        $this->db->where('udc_list_auto_p_iidd', $clicked_user_idd);
        $this->db->update('customer_full_info', $element_array);
    }

    public function approve_user_by_custid($clicked_user_idd, $user_data_array)
    {
        $this->db->where('user_full_tbl_id', $clicked_user_idd);
        $this->db->update('users', $user_data_array);
    }

    public function get_all_user_groups()
    {
        $sql = $this->db->get('groups');
        return $sql->result();
    }
}


