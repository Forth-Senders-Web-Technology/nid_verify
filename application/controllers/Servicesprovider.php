<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicesprovider extends CI_Controller
{
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
        $this->load->template('provider/all_service', $this->data);
    }

    public function get_all_Waiting_services()
    {
        $query_data = $this->services_model->get_Waiting_services();
        echo json_encode($query_data);
    }

    public function select_this_services_in_login_user()
    {
        $select_service_id = $this->input->post('request_services_iid');

        $array_data = array(
                    'check_in_user_id' => $this->user_id, 
                    'check_in_times' => time(), 
                );
        $this->services_model->select_this_services_in_login_user($select_service_id, $array_data);
    }

    public function my_basket_services()
    {
        $this->load->template('provider/my_basket_service', $this->data);
    }

    public function get_my_provide_services()
    {
        $query_data = $this->services_model->get_my_provide_services($this->user_id);
        echo json_encode($query_data);
    }

    public function insert_nid_data()
    {
        $array_data = array(
                    'nid_no' => $this->input->post('nid_no'), 
                    'nid_pin_no' => $this->input->post('nid_pin_no'), 
                    'requ_status' => 2, 
                    'delivery_time' => time(), 
                    'delivery_user_id' => $this->user_id, 
                );
        $this->services_model->select_this_services_in_login_user($array_data, $this->input->post('services_id'));
    }
}