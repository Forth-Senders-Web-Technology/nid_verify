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

        $this->db->join('div_list', 'div_list.div_id = customer_full_info.div_a_iddd', 'left');
        $this->db->join('dist_list', 'dist_list.dist_id = customer_full_info.dist_a_iddd', 'left');
        $this->db->join('up_list', 'up_list.up_id = customer_full_info.up_a_iddd', 'left');
        $this->db->join('un_list', 'un_list.un_id = customer_full_info.un_a_iddd', 'left');

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

    public function update_user_groups($this_login_user_idd, $update_user_group_data)
    {
        $this->db->where('user_id', $this_login_user_idd);
        $this->db->update('users_groups', $update_user_group_data);
    }

    public function get_all_users()
    {
        $sql = $this->db->get('users');
        return $sql->result();
    }

    public function get_udc_by_mobile_no($mobile_no)
    {
        $this->db->like('user_phone_no', $mobile_no);
        $this->db->join('users', 'users.user_full_tbl_id = customer_full_info.udc_list_auto_p_iidd', 'left');
        $this->db->join('div_list', 'div_list.div_id = customer_full_info.div_a_iddd', 'left');
        $this->db->join('dist_list', 'dist_list.dist_id = customer_full_info.dist_a_iddd', 'left');
        $this->db->join('up_list', 'up_list.up_id = customer_full_info.up_a_iddd', 'left');
        $this->db->join('un_list', 'un_list.un_id = customer_full_info.un_a_iddd', 'left');
        $sql = $this->db->get('customer_full_info');
        return $sql->result();
    }

    public function get_udc_by_selected_union_id($un_id)
    {
        $this->db->where('un_a_iddd', $un_id);
        $this->db->join('users', 'users.user_full_tbl_id = customer_full_info.udc_list_auto_p_iidd', 'left');
        $this->db->join('div_list', 'div_list.div_id = customer_full_info.div_a_iddd', 'left');
        $this->db->join('dist_list', 'dist_list.dist_id = customer_full_info.dist_a_iddd', 'left');
        $this->db->join('up_list', 'up_list.up_id = customer_full_info.up_a_iddd', 'left');
        $this->db->join('un_list', 'un_list.un_id = customer_full_info.un_a_iddd', 'left');
        $sql = $this->db->get('customer_full_info');
        return $sql->result();
    }

    public function get_customer_info_by_cus_id($this_user_idd)
    {
        $this->db->where('udc_list_auto_p_iidd', $this_user_idd);
        $this->db->join('users', 'users.user_full_tbl_id = customer_full_info.udc_list_auto_p_iidd', 'left');
        $this->db->join('div_list', 'div_list.div_id = customer_full_info.div_a_iddd', 'left');
        $this->db->join('dist_list', 'dist_list.dist_id = customer_full_info.dist_a_iddd', 'left');
        $this->db->join('up_list', 'up_list.up_id = customer_full_info.up_a_iddd', 'left');
        $this->db->join('un_list', 'un_list.un_id = customer_full_info.un_a_iddd', 'left');
        $sql = $this->db->get('customer_full_info');
        return $sql->row();
    }

    public function get_all_users_group()
    {
        $sql = $this->db->get('groups');
        return $sql->result();
    }

    public function edit_user_by_id($this_login_user_id, $user_data_array)
    {
        $this->db->where('id', $this_login_user_id);
        $this->db->update('users', $user_data_array);
    }

    public function get_user_by_login_user_id($this_user_iidd)
    {
        $this->db->where('id', $this_user_iidd);
        $sql = $this->db->get('users');
        return $sql->row();
    }

	public function get_user_by_usergroup($user_group_s)
	{
        $this->db->where('name', $user_group_s);
		$this->db->join('users_groups', 'users_groups.user_id = users.id', 'left');
		$this->db->join('groups', 'groups.id = users_groups.group_id', 'left');
		$this->db->join('customer_full_info', 'customer_full_info.udc_list_auto_p_iidd = users.user_full_tbl_id', 'left');
        $this->db->join('div_list', 'div_list.div_id = customer_full_info.div_a_iddd', 'left');
        $this->db->join('dist_list', 'dist_list.dist_id = customer_full_info.dist_a_iddd', 'left');
        $this->db->join('up_list', 'up_list.up_id = customer_full_info.up_a_iddd', 'left');
        $this->db->join('un_list', 'un_list.un_id = customer_full_info.un_a_iddd', 'left');
        $sql = $this->db->get('users');
        return $sql->result(); 
	}
}
