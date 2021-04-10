<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class Sadmin extends CI_Controller
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

    public function close_secreate_services_view()
    {
        $this->load->template('sadmin/close_services', $this->data);
    }

    public function get_services_activity()
    {
        echo json_encode($this->data);
        $this->output->set_content_type('application/json');
    }

    public function update_home_page_activity()
    {
        if ($this->data['setting_info']->home_page_ISactive == 1) {
            $activity_h = 0;
        }else {
            $activity_h = 1;
        }

        $arrayData_s = array(
                    'home_page_ISactive' => $activity_h,
                );
            $this->setting_model->update_setting_s($arrayData_s);
    }

    public function update_secret_service_activity()
    {
        if ($this->data['setting_info']->all_services_ISactive == 1) {
            $activity_s = 0;
        }else {
            $activity_s = 1;
        }

        $arrayData_s = array(
                    'all_services_ISactive' => $activity_s,
                );
            $this->setting_model->update_setting_s($arrayData_s);
    }

    public function user_approve_view()
    {
        $this->load->template('sadmin/user_approve_view_file', $this->data);
    }

    public function get_all_waiting_users()
    {
        $waiting_user_info = $this->user_model->get_waiting_users();
        echo json_encode($waiting_user_info);
        $this->output->set_content_type('application/json'); 
    }
    
    public function approve_user_by_id()
    {
        $clicked_user_idd = $this->input->post('clicked_user_id');
        $this_user_email = $this->input->post('this_user_email');

        $element_array = array(
                        'activity'          => 1,
                        'approved_user_idd' => $this->user_id,
                    );
        $this->user_model->approve_customer_by_id($clicked_user_idd, $element_array);

        $user_data_array = array(
                        'active'          => 1,
                    );
        $this->user_model->approve_user_by_custid($clicked_user_idd, $user_data_array);


        $mail = new PHPMailer(true);
        $auth = true;

        if ($auth) {
          $mail->IsSMTP(); 
          $mail->SMTPAuth = true; 
          $mail->SMTPSecure = "ssl"; 
          $mail->Host = "smtp.gmail.com"; 
          $mail->Port = 465; 
          $mail->Username = "forthsenders@gmail.com"; 
          $mail->Password = "Kolopona.123"; 
        }
        
        $mail->AddAddress($this_user_email);
        $mail->SetFrom("forthsenders@gmail.com", "Digital Services");
        $mail->isHTML(true);
        $mail->Subject = "Account Approved";
        $mail->Body = '
                        <h1 style="test-align:center; color: green;"> Account Approved </h1>
                        <h4 style="test-align:center; ">Your Account hasbeen Approved Successfully, Now you take services after login. </h4>
                        <p style=""> Now go to our web site,  login here and take our services. </p>
                    ';        
        $mail->Send();
    }
    
    public function cancel_user_by_id()
    {
        $clicked_user_idd = $this->input->post('clicked_user_id');

        $element_array = array(
                        'activity'          => 2,
                        'approved_user_idd' => $this->user_id,
                    );
        $this->user_model->approve_customer_by_id($clicked_user_idd, $element_array);
    }

    public function payment_confirm_file_view()
    {
        $this->load->template('sadmin/payment_confirm_file', $this->data);
    }

    public function get_waiting_payment()
    {
        $waiting_user_info = $this->payment_model->get_waiting_payments();
        echo json_encode($waiting_user_info);
        $this->output->set_content_type('application/json'); 
    }

    public function approve_payment_request()
    {
        $arr_data_for_db = array(
                        'request_pids'      => $this->input->post('pay_request_id'),
                        'added_amount'      => $this->input->post('payment_amount'),
                        'payment_trid_s'    => $this->input->post('payment_trxid_id'),
                        'customer_id'       => $this->input->post('cust_idd'),
                        'time_stamp'        => time(),
                    );
        $this->payment_model->payment_added_method($arr_data_for_db);

        $array_for_db = array(
                    'status_present'        => 1, 
                    'remark_s'              => 'Success',
                    'approve_time'          => time(),
                    'approve_user_iiiiiiid' => $this->user_id
                );
        $this->payment_model->update_payment_request_opt($this->input->post('pay_request_id'), $array_for_db);

    }

    public function reject_this_pay_request()
    {
        $array_for_db = array(
                    'status_present'        => 2, 
                    'remark_s'              => 'Success',
                    'approve_time'          => time(),
                    'approve_user_iiiiiiid' => $this->user_id
                );
        $this->payment_model->update_payment_request_opt($this->input->post('requ_idd'), $array_for_db);
    }

    public function groupwise_services_rate()
    {
        $this->data['all_groups'] = $this->user_model->get_all_user_groups();
        $this->data['groups_rates'] = $this->services_model->get_services_by_rate_group_wise();
        $this->load->template('sadmin/group_wise_services_rate_view_file', $this->data);
    }

    public function get_services_rates_json_encode()
    {
        $this_rates_id = $this->input->post('this_rates_id');
        $get_data = $this->services_model->get_services_rates_by_id($this_rates_id);
        echo json_encode($get_data);
    }

    public function update_services_rate()
    {
        $services_rate_p_id_set = $this->input->post('services_rate_p_id_set');
        $enter_services_rates = $this->input->post('enter_services_rates');
        
        $arraysDatas = array(
                    'serive_s_rate_s' => $enter_services_rates, 
                );
        $this->services_model->update_services_rate_by_auto_id($services_rate_p_id_set, $arraysDatas);
        $this->session->set_flashdata('success', 'Update Successfuly');
        redirect("group_services_rate");
    }
}