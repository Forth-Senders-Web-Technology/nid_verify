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
        $sql_insert = $this->db->insert('customer_full_info', $data);
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
}