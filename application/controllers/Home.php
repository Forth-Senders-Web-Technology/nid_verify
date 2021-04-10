<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();           
        $this->load->library('Ion_auth');
        $this->load->model('setting_model');
        $this->load->model('user_model');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('user_agent');
        $this->load->library('email');

        if ($this->ion_auth->logged_in()) {
            redirect('admin');
        }

        $this->data['setting_info'] = $this->setting_model->getSetting();
    }

    public function index()
    {
        if ($this->data['setting_info']->home_page_ISactive == 1) {
            $this->load->front('front/home', $this->data);
        }else {
            redirect('https://services.nidw.gov.bd/','refresh');
        }
    }

    public function registration()
    {
        $this->data['div_info'] = $this->setting_model->getDivision();
        $this->load->front('front/reg', $this->data);
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

            $data = array(
                'div_a_iddd'        => $this->input->post('div_list'),
                'dist_a_iddd'       => $this->input->post('dis_list'),
                'up_a_iddd'         => $this->input->post('up_list'),
                'un_a_iddd'         => $this->input->post('un_list'),
                'institute_name'    => $this->input->post('inistitute'),
                'address_full'      => $this->input->post('address'),
                'nid_no'            => $this->input->post('nid_no'),
                'activity'          => 0,                
                'user_phone_no'     => $this->input->post('mobile_no'),
                'user_email_no'     => $this->input->post('email_no'),
                'user_person_name'  => $this->input->post('person_name')
            );
        $last_insert_id = $this->user_model->insert_customer_info($data);

        $user_data = array(
            'ip_address'        => $this->input->ip_address(),
            'username'          => $this->input->post('username'),
            'password'          => $this->ion_auth_model->hash_password($this->input->post('password')),
            'email'             => $this->input->post('email_no'),
            'active'            => '0',
            'created_on'        => time(),
            'company'           => $this->input->post('inistitute'),
            'phone'             => $this->input->post('mobile_no'),
            'user_full_tbl_id'  => $last_insert_id
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
        $this->load->front('front/login', $this->data);
    }

    public function forget_password_view()
    {
        $this->load->front('front/password_forget', $this->data);
    }

    public function reset_password()
    {
        $mail = new PHPMailer(true);
        $auth = true;
        $a = $this->input->post('a');        
        $a = $this->input->post('a');        
        $a = $this->input->post('a');        
        
        if ($auth) {
          $mail->IsSMTP(); 
          $mail->SMTPAuth = true; 
          $mail->SMTPSecure = "ssl"; 
          $mail->Host = "smtp.gmail.com"; 
          $mail->Port = 465; 
          $mail->Username = "forthsenders@gmail.com"; 
          $mail->Password = "Kolopona.123"; 
        }
        
        $mail->AddAddress("ictin.net@gmail.com");
        $mail->SetFrom("babunayem@gmail.com", "Digital Services");
        $mail->isHTML(true);
        $mail->Subject = "Reset Password";
        $mail->Body = "Hello World";
        
        $mail->Send();

        

    }

    public function approve_user_mail()
    {
        



        $mail = new PHPMailer(true);
        $auth = true;
        $a = $this->input->post('a');        
        $a = $this->input->post('a');        
        $a = $this->input->post('a');        
        
        if ($auth) {
          $mail->IsSMTP(); 
          $mail->SMTPAuth = true; 
          $mail->SMTPSecure = "ssl"; 
          $mail->Host = "smtp.gmail.com"; 
          $mail->Port = 465; 
          $mail->Username = "forthsenders@gmail.com"; 
          $mail->Password = "Kolopona.123"; 
        }
        
        $mail->AddAddress("ictin.net@gmail.com");
        $mail->SetFrom("babunayem@gmail.com", "Digital Services");
        $mail->isHTML(true);
        $mail->Subject = "Reset Password";
        $mail->Body = "Hello World";
        
        $mail->Send();











    }
}

/* End of file Home.php */
