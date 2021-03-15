<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('user_agent');
        // $this->load->library('pdf');
        $this->load->helper('url');
        $this->load->library('curl');

        $this->load->model('setting_model');
        $this->load->model('user_model');
        $this->load->model('ion_auth_model');
        $this->load->model('payment_model');
        $this->load->model('services_model');
        
        if (!$this->ion_auth->logged_in()) {
            redirect('logout', 'refresh');
        }

        $this->user_id = $this->ion_auth->user()->row()->user_full_tbl_id;
        $this->data['user_info'] = $this->user_model->get_user_info($this->user_id);
        $this->data['setting_info'] = $this->setting_model->getSetting();

    }

    public function index()
    {
		$this->load->template('welcome_message', $this->data);
    }

    public function nid_verify()
    {
        $this->load->template('admin/nid_verify_view',  $this->data);
    }

    public function birth_verify_view()
    {
        $this->load->template('admin/birth_verify_view',  $this->data);
    }

    public function payment_view()
    {
        $this->load->template('admin/payment_view',  $this->data);
    }

    public function statement_view()
    {
        $this->load->template('admin/payment_view',  $this->data);
    }

    public function get_nid_no()
    {
        $user_group_id = $this->ion_auth->get_users_groups()->row()->id;
        $service_s_idd = '1';
        $this->data['service_rate'] = $this->services_model->get_services_list($service_s_idd, $user_group_id);
        $this->load->template('admin/get_nid_no',  $this->data);
    }

    public function balance_query()
    {
        // get_user_info($user_id)
        $this->data['payment_added'] = $this->payment_model->payment_added_info($this->user_id);
        $this->data['payment_cut'] = $this->payment_model->payment_cut_info($this->user_id);
        echo json_encode($this->data);
    }

    // get nid no Services data by user id
    public function get_nid_data_use()
    {
        $user_id = $this->ion_auth->user()->row()->user_full_tbl_id;

    }

    public function down()
    {
        $this->load->template('admin/download_file',  $this->data);
    }

    public function getNID_request_by_user()
    {
        $select_date_temp = $this->input->post('query_date');
        if (empty($select_date_temp)) {
            $select_date = date('Y-m-d', time());
        }else {
            $select_date = date('Y-m-d', strtotime($select_date_temp));
        }
        $get_date = $this->services_model->getNID_requ($this->user_id, $select_date);
        echo json_encode($get_date);
        $this->output->set_content_type('application/json'); 
    }

    public function insert_new_server_copy_request()
    {
        $data_arr = array(
                    'cut_amount'    => $this->input->post('services_rate'), 
                    'cust_id'       => $this->user_id, 
                    'services_iidd' => 2, 
                    'time_s'        => time(), 
                );
        $last_insert_id = $this->services_model->insert_this_services_cost($data_arr);

        $insert_data_arr = array(
                        'slip_no' => $this->input->post('slip_no'), 
                        'voter_no' => $this->input->post('voter_no'), 
                        'person_name' => $this->input->post('person_name'), 
                        'birth_date' => $this->input->post('birth_date'), 
                        'entry_time' => time(), 
                        'entry_date' => date('Y-m-d', time()), 
                        'user_iddd' => $this->user_id, 
                        'services_id ' => 2, 
                        'payment_cut_a_iddd' => $last_insert_id
                    );
        $this->services_model->insert_services_data($insert_data_arr);
    }
    
    public function insert_new_NID_request()
    {
        $data_arr = array(
                    'cut_amount'    => $this->input->post('services_rate'), 
                    'cust_id'       => $this->user_id, 
                    'services_iidd' => 1, 
                    'time_s'        => time(), 
                );
        $last_insert_id = $this->services_model->insert_this_services_cost($data_arr);

        $insert_data_arr = array(
                        'slip_no' => $this->input->post('slip_no'), 
                        'voter_no' => $this->input->post('voter_no'), 
                        'person_name' => $this->input->post('person_name'), 
                        'birth_date' => $this->input->post('birth_date'), 
                        'entry_time' => time(), 
                        'entry_date' => date('Y-m-d', time()), 
                        'user_iddd' => $this->user_id, 
                        'services_id ' => 1, 
                        'payment_cut_a_iddd' => $last_insert_id
                    );
        $this->services_model->insert_services_data($insert_data_arr);
    }

    public function ec_server_copy_view()
    {
        $user_group_id = $this->ion_auth->get_users_groups()->row()->id;
        $service_s_idd = '2';
        $this->data['service_rate'] = $this->services_model->get_services_list($service_s_idd, $user_group_id);
        $this->load->template('admin/server_copy_view', $this->data);
    }

    public function getServe_request_by_user()
    {
        $select_date_temp = $this->input->post('query_date');
        if (empty($select_date_temp)) {
            $select_date = date('Y-m-d', time());
        }else {
            $select_date = date('Y-m-d', strtotime($select_date_temp));
        }
        $get_date = $this->services_model->getServer_copy_request($this->user_id, $select_date);
        echo json_encode($get_date);
        $this->output->set_content_type('application/json'); 
    }

}