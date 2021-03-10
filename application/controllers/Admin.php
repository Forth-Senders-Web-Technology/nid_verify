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
        
        if (!$this->ion_auth->logged_in()) {
            redirect('logout', 'refresh');
        }
    }

    public function index()
    {
        $data['setting_info'] = $this->setting_model->getSetting();
		$this->load->template('welcome_message');
    }

    public function nid_verify()
    {
        $data['setting_info'] = $this->setting_model->getSetting();
        $this->load->template('admin/nid_verify_view',  $data);
    }

    public function birth_verify_view()
    {
        $data['setting_info'] = $this->setting_model->getSetting();
        $this->load->template('admin/birth_verify_view',  $data);
    }

}