<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();           
        $this->load->model('setting_model');
        $this->load->model('user_model');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('user_agent');
        $this->load->library('email');
    }

    public function index()
    {
        $data['setting_info'] = $this->setting_model->getSetting();
        $this->load->front('front/home', $data);
    }

    public function registration()
    {
        $data['setting_info'] = $this->setting_model->getSetting();
        $data['div_info'] = $this->setting_model->getDivision();
        $this->load->front('front/reg', $data);
    }

    // Get District by Division ID and Json Encoded
    public function getDistrict_byDivID()
    {
        $div_id = $this->input->post('div_id');
        $data = $this->setting_model->getDistrict($div_id);
        echo json_encode($data);
    }

    // Get Upazilla by District ID and Json Encoded
    public function getUpazilla_byDistID()
    {
        $dist_id = $this->input->post('dist_id');
        $data = $this->setting_model->getUpazilla($dist_id);
        echo json_encode($data);
    }

    // Get Union by Upazilla ID and Json Encoded
    public function getUnion_byUPID()
    {
        $upid = $this->input->post('upid');
        $data = $this->setting_model->getUnion($upid);
        echo json_encode($data);
    }

    // Registration user
    public function signup()
    {
                // '' => $this->input->post('username'),
                // '' => $this->input->post('password') 
                // $this->ion_auth_model->hash_password($pass) 
                // $this->input->ip_address()


            $data = array(
                'div_a_iddd' => $this->input->post('div_list'),
                'dist_a_iddd' => $this->input->post('dis_list'),
                'up_a_iddd' => $this->input->post('up_list'),
                'un_a_iddd' => $this->input->post('un_list'),
                'institute_name' => $this->input->post('inistitute'),
                'address_full' => $this->input->post('address'),
                'nid_no' => $this->input->post('nid_no'),
                'udc_phone_no' => $this->input->post('mobile_no'),
                'udc_email_no' => $this->input->post('email_no')
            );
        $last_insert_id = $this->user_model->insert_customer_info($data);

        $user_data = array(
            'ip_address' => $this->input->ip_address(),
            'username' => $this->input->post('username'),
            'password' => $this->ion_auth_model->hash_password($this->input->post('password')),
            'email' => $this->input->post('email_no'),
            'active' => '0',
            'created_on' => time(),
            'company' => $this->input->post('inistitute'),
            'phone' => $this->input->post('mobile_no'),
            'user_full_tbl_id' => $last_insert_id
        );        
        $inserted_user_id = $this->user_model->insert_user_tbl($user_data);

        $user_group = array(
                    'user_id' => $inserted_user_id, 
                    'group_id' => '4'
                );
        $this->user_model->insert_user_group_tbl($user_group);

        redirect('waiting_msg', $approval_data);        
    }

    public function waiting_msg()
    {
        $view_string['approval_data'] = 'Wait for approval, Admin approve you after verify address';

        $view_string['browser'] = $this->agent->browser();
        $view_string['browserVersion'] = $this->agent->version();
        $view_string['platform'] = $this->agent->platform();
        $view_string['full_user_agent_string'] = $_SERVER['HTTP_USER_AGENT'];

        $this->load->front('front/waiting_msg', $view_string);        
    }

    public function login()
    {
        $data['setting_info'] = $this->setting_model->getSetting();
        $this->load->front('front/login', $data);
    }

    public function forget_password_view()
    {
        $data['setting_info'] = $this->setting_model->getSetting();
        $this->load->front('front/password_forget', $data);
    }

    public function reset_password()
    {
        $entry_email = $this->input->post('entry_email');

        $this->email->from('your@example.com', 'Your Name');
        $this->email->to($entry_email);
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();
        // $this->load->front('front/',);
    }
}

/* End of file Home.php */
