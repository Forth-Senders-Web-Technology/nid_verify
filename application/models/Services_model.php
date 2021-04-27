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
        $this->db->order_by('services_tbl_a_idd', 'desc');
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

    public function get_sevices_rate_for_provider()
    {
        $this->db->join('services_list_tbl', 'services_list_tbl.services_list_tbl_p_id = provider_rate.services_idd', 'left');
        $sql = $this->db->get('provider_rate');
        return $sql->result(); 
    }

    public function get_Waiting_services()
    {
        $this->db->where('requ_status', 0);
        $this->db->where('check_in_user_id', NULL);
        $this->db->join('services_list_tbl', 'services_list_tbl.services_list_tbl_p_id = services_request_tbl.services_id', 'left');        
        $this->db->join('customer_full_info', 'customer_full_info.udc_list_auto_p_iidd = services_request_tbl.user_iddd', 'left');
        $sql = $this->db->get('services_request_tbl');
        return $sql->result(); 
    }

    public function select_this_services_in_login_user($select_service_id, $array_data)
    {
        $this->db->where('services_tbl_a_idd', $select_service_id);
        $this->db->update('services_request_tbl', $array_data);
    }

    public function get_my_provide_services($user_id)
    {
        $this->db->where('requ_status', 0);
        $this->db->where('check_in_user_id', $user_id);
        $this->db->join('services_list_tbl', 'services_list_tbl.services_list_tbl_p_id = services_request_tbl.services_id', 'left');          
        $this->db->join('customer_full_info', 'customer_full_info.udc_list_auto_p_iidd = services_request_tbl.user_iddd', 'left');    
        $sql = $this->db->get('services_request_tbl');
        return $sql->result(); 
    }

    public function updated_services_cost($data_arr, $services_payment_cut_idd)
    {
        $this->db->where('payment_cut_a_iidd', $services_payment_cut_idd);
        $this->db->update('payment_cut', $data_arr);
    }

    public function get_services_activity_check()
    {
        $this->db->join('services_list_tbl', 'services_list_tbl.services_list_tbl_p_id = services_activity.services_iiddd', 'left');        
        $sql = $this->db->get('services_activity');
        return $sql->result(); 
    }

    public function get_services_by_rate_group_wise()
    {
        $this->db->join('services_list_tbl', 'services_list_tbl.services_list_tbl_p_id = service_rate_group.service_s_iid', 'left');
        $this->db->join('groups', 'groups.id = service_rate_group.user_group_uniq_idd', 'left');
        $sql = $this->db->get('service_rate_group');
        return $sql->result(); 
    }

    public function get_services_rates_by_id($this_rates_id)
    {
        $this->db->where('service_rate_by_group_id', $this_rates_id);
        $this->db->join('services_list_tbl', 'services_list_tbl.services_list_tbl_p_id = service_rate_group.service_s_iid', 'left');
        $this->db->join('groups', 'groups.id = service_rate_group.user_group_uniq_idd', 'left');
        $sql = $this->db->get('service_rate_group');
        return $sql->row();
    }

    public function update_services_rate_by_auto_id($services_rate_p_id_set, $arraysDatas)
    {
        $this->db->where('service_rate_by_group_id', $services_rate_p_id_set);
        $this->db->update('service_rate_group', $arraysDatas);
    }

    public function get_all_sonod_for_select()
    {
        $sql = $this->db->get('cer_deft');
        return $sql->result();
    }

    public function get_this_sonod_info($this_sonod_idd)
    {
        $this->db->where('cer_def_p_iidi', $this_sonod_idd);
        $sql = $this->db->get('cer_deft');
        return $sql->row();
    }

    public function add_new_certificate($insert_data)
    {
        $this->db->insert('certificate_entry', $insert_data); 
        $insert_id = $this->db->insert_id();
        return $insert_id;       
    }

    public function getCertificateByID($get_id)
    {
        $this->db->where('cer_p_iddd', $get_id);
        $sql = $this->db->get('certificate_entry');
        return $sql->row();
    }

    public function getLastCertificateByDate($this_date_today)
    {
        $this->db->where('cer_entry_date', $this_date_today);
        $this->db->order_by('cer_p_iddd', 'DESC');
        $this->db->limit(1);
        $sql = $this->db->get('certificate_entry');
        return $sql->row();
    }

	public function get_admin_give_services_info_datewise($user_id, $this_date)
	{
        $this->db->where('delivery_this_date', $this_date);
        $this->db->where('delivery_user_id', $user_id);
        $this->db->where('requ_status', '1');
        $sql = $this->db->get('services_request_tbl');
        return $sql->result(); 
	}

	public function get_services_provide_full_info($start_date_s, $ended_date_s)
	{
        $this->db->where('delivery_this_date >=', $start_date_s);
        $this->db->where('delivery_this_date <=', $ended_date_s);
        $sql = $this->db->get('services_request_tbl');
        return $sql->result(); 
	}

	public function get_services_user_ss()
	{
        $this->db->where('name', 'admin');
        $this->db->or_where('name', 's_admin');
        $this->db->or_where('name', 'services');
		$this->db->join('users_groups', 'users_groups.user_id = users.id', 'left');
		$this->db->join('groups', 'groups.id = users_groups.group_id', 'left');
		$this->db->join('customer_full_info', 'customer_full_info.udc_list_auto_p_iidd = users.user_full_tbl_id', 'left');
        $sql = $this->db->get('users');
        return $sql->result(); 
	}

    public function get_all_services_list_ss()
    {
        $sql = $this->db->get('services_list_tbl');
        return $sql->result(); 
    }

	public function get_personal_services_info_full_info($start_date_s, $ended_date_s, $user_id)
	{
        $this->db->where('entry_date >=', $start_date_s);
        $this->db->where('entry_date <=', $ended_date_s);
        $this->db->where('user_iddd', $user_id);
		$this->db->join('services_list_tbl', 'services_list_tbl.services_list_tbl_p_id = services_request_tbl.services_id', 'left');
		$this->db->join('payment_cut', 'payment_cut.payment_cut_a_iidd = services_request_tbl.payment_cut_a_iddd', 'left');
		$this->db->join('customer_full_info', 'customer_full_info.udc_list_auto_p_iidd = services_request_tbl.user_iddd', 'left');
        $sql = $this->db->get('services_request_tbl');
        return $sql->result(); 
	}

}

/* End of file Services_model.php */
