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
        $get_date = $this->services_model->getNID_requ($this->user_id);
    }

}