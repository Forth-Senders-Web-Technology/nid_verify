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

    public function update_ec_office_service_activity()
    {
        if ($this->data['setting_info']->ec_services_is_active == 1) {
            $activity_s = 0;
        }else {
            $activity_s = 1;
        }

        $arrayData_s = array(
                    'ec_services_is_active' => $activity_s,
                );
            $this->setting_model->update_setting_s($arrayData_s);
    }

    public function update_ec_service_on_off()
    {
        if ($this->data['setting_info']->ec_services_is_on_off == 1) {
            $activity_s = 0;
        }else {
            $activity_s = 1;
        }

        $arrayData_s = array(
                    'ec_services_is_on_off' => $activity_s,
                );
            $this->setting_model->update_setting_s($arrayData_s);
    }

    public function user_approve_view()
    {
        $this->data['all_groups'] = $this->user_model->get_all_user_groups();
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
        $selected_group_id = $this->input->post('selected_group_id');
        $this_login_user_idd = $this->input->post('this_login_user_idd');

        $element_array = array(
                        'activity'          => 1,
                        'approved_user_idd' => $this->user_id,
                    );
        $this->user_model->approve_customer_by_id($clicked_user_idd, $element_array);

        $user_data_array = array(
                        'active'          => 1,
                    );
        $this->user_model->approve_user_by_custid($clicked_user_idd, $user_data_array);

        $update_user_group_data = array(
                    'group_id'          => $selected_group_id,
                );
        $this->user_model->update_user_groups($this_login_user_idd, $update_user_group_data);


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

    public function user_manage_view_fun()
    {
        $this->data['div_info'] = $this->setting_model->getDivision();
        $this->data['user_group'] = $this->user_model->get_all_users_group();
        $this->load->template('sadmin/user_management_view_file', $this->data);
    }

    public function get_udc_verify_by_mobile()
    {
        $mobile_no = $this->input->post('type_mobile_no');
        $get_data = $this->user_model->get_udc_by_mobile_no($mobile_no);
        echo json_encode($get_data);
    }

    public function get_customer_info_by_cus_id()
    {
        $this_user_idd = $this->input->post('this_user_idd');
        $get_data = $this->user_model->get_customer_info_by_cus_id($this_user_idd);
        echo json_encode($get_data);
    }

    public function edit_user_group_user_name()
    {
        $this_login_user_id = $this->input->post('this_login_user_id');
        $this_user_idd = $this->input->post('attr_this_customer_idd');
        $select_user_group = $this->input->post('select_user_group');
        $type_user_name = $this->input->post('type_user_name');

        $user_data_array = array(
                    'username' => $type_user_name, 
                );
        $this->user_model->edit_user_by_id($this_login_user_id, $user_data_array);

        $update_user_group_data = array(
                    'group_id'          => $select_user_group,
                );
        $this->user_model->update_user_groups($this_login_user_id, $update_user_group_data);
    }

    public function update_login_user_password()
    {
        $this_login_user_id = $this->input->post('this_login_user_id');
        $type_user_password = $this->ion_auth_model->hash_password($this->input->post('type_user_password'));

        $user_data_array = array(
                'password' => $type_user_password, 
            );
        $this->user_model->edit_user_by_id($this_login_user_id, $user_data_array);
    }

    public function amount_withdraw_confirm_file_view()
    {
        $this->load->template('sadmin/amount_withdraw_confirm_file', $this->data);
    }

    public function get_waiting_withdraw_payment()
    {
        $get_data = $this->payment_model->get_waiting_withdraw_amount();
        echo json_encode($get_data);
    }

    public function approve_withdraw_amount_request()
    {
        $pay_request_id = $this->input->post('pay_request_id');
        $payment_trxid = $this->input->post('payment_trxid');
        $UpdateArrayData = array(
                    'payment_status' => 'Success', 
                    'payment_sending_trid' => $payment_trxid, 
                    'success_time' => time(),
                    'withdraw_check_status_s' => 1
                );
        $this->payment_model->approve_withdraw_amount_request($pay_request_id, $UpdateArrayData);
    }

    public function reject_withdraw_pay_request()
    {
        $requ_idd = $this->input->post('requ_idd');
        $withdraw_requ_info = $this->payment_model->get_withdraw_requ_info_by_id($requ_idd);
        $UpdateArrayData = array(
                    'payment_status' => 'Rejected', 
                    'success_time' => time(),
                    'withdraw_check_status_s' => 2
                );
        $this->payment_model->approve_withdraw_amount_request($requ_idd, $UpdateArrayData);

        $inserts_array_datass = array(
                        'added_amount' => $withdraw_requ_info->amount_s,
                        'customer_id' => $withdraw_requ_info->user_iddd,
                    );
        $this->payment_model->payment_added($inserts_array_datass);
    }

    public function customer_wallet_by_customer_id()
    {
        $customer_iid = $this->input->post('customer_idd');
        $payment_added = $this->payment_model->payment_added_info($customer_iid);
        $payment_cut = $this->payment_model->payment_cut_info($customer_iid);
        $now_balance = $payment_added - $payment_cut;
        echo json_encode($now_balance);
        $this->output->set_content_type('application/json'); 
    }

    public function active_inactive_user_fun()
    {
        $this_user_iidd = $this->input->post('this_user_iidd');
        $user_info = $this->user_model->get_user_by_login_user_id($this_user_iidd);
        
        if ($user_info->active == 1) {
            $user_s_activity = 0;
        }else {
            $user_s_activity = 1;
        }

        $user_data_array = array(
            'active'          => $user_s_activity,
        );
        $this->user_model->edit_user_by_id($this_user_iidd, $user_data_array);
        echo json_encode($user_info->user_full_tbl_id);
    }

	public function add_payment_by_admin()
	{
        $arr_data_for_db = array(
                        'added_amount'      => $this->input->post('add_money_type'),
                        'payment_trid_s'    => 'Payment Add by Admin',
                        'customer_id'       => $this->input->post('customer_uniq_idd'),
                        'time_stamp'        => time(),
                    );
        $this->payment_model->payment_added_method($arr_data_for_db);
	}

	public function cut_payment_by_admin()
	{        
        $data_arr = array(
                    'cut_amount'            => $this->input->post('cut_money_type'),
                    'cust_id'               => $this->input->post('customer_uniq_idd'),
                    'time_s'                => time(),
                    'payment_cut_causes'    => 'Money Cut by Admin'
                );
        $this->services_model->insert_this_services_cost($data_arr);
	}

	public function get_services_provide_print_view()
	{
		$start_date_s = date('Y-m-d', strtotime($this->input->get('start_date')));
		$ended_date_s = date('Y-m-d', strtotime($this->input->get('end_date')));
        $this->data['services_provide_info'] = $this->services_model->get_services_provide_full_info($start_date_s, $ended_date_s);

        $this->data['services_provide_user_info'] = $this->services_model->get_services_user_ss();

        $this->data['get_services_list'] = $this->services_model->get_all_services_list_ss();

		$this->load->view('sadmin/services_provider_view_file', $this->data);
	}

	public function get_personal_services_info()
	{
		$start_date_s = date('Y-m-d', strtotime($this->input->get('start_date')));
		$ended_date_s = date('Y-m-d', strtotime($this->input->get('end_date')));
        $this->data['personal_services_info'] = $this->services_model->get_personal_services_info_full_info($start_date_s, $ended_date_s, $this->user_id);

		$this->load->view('sadmin/personal_services_info_view_file', $this->data);
	}

	public function get_agent_user_view()
	{
		$this->load->template('sadmin/get_all_agent_view', $this->data);
	}

	public function get_all_agent_user()
	{
		$user_group_s = 'agent';
		$all_user = $this->user_model->get_user_by_usergroup($user_group_s);
		echo json_encode($all_user);
	}

	public function get_agent_user_services_date_date()
	{
		$start_date_s = date('Y-m-d', strtotime($this->input->get('start_date')));
		$ended_date_s = date('Y-m-d', strtotime($this->input->get('end_date')));
		$user_group_s = 'agent';
		$this->data['services_provide_user_info'] = $this->user_model->get_user_by_usergroup($user_group_s);
        $this->data['services_provide_info'] = $this->services_model->get_services_provide_full_info($start_date_s, $ended_date_s);

        $this->data['get_services_list'] = $this->services_model->get_all_services_list_ss();

		$this->load->view('sadmin/agent_services_statement_view_file', $this->data);
	}
}
