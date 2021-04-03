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
}