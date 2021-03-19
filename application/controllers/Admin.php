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
        $user_group_id = $this->ion_auth->get_users_groups()->row()->id;
        $service_s_idd = '9';
        $this->data['service_rate'] = $this->services_model->get_services_list($service_s_idd, $user_group_id);
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
        $this->output->set_content_type('application/json'); 
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

    public function get_full_data_table_by_service()
    {
        $select_date_temp = $this->input->post('query_date');
        $service_id_s = $this->input->post('services_list_id');
        if (empty($select_date_temp)) {
            $select_date = date('Y-m-d', time());
        }else {
            $select_date = date('Y-m-d', strtotime($select_date_temp));
        }
        
        $get_date = $this->services_model->getNID_requ($this->user_id, $select_date, $service_id_s);
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
    
    public function insert_new_search_request()
    {
        $data_arr = array(
                    'cut_amount'    => $this->input->post('services_rate'), 
                    'cust_id'       => $this->user_id, 
                    'services_iidd' => 1, 
                    'time_s'        => time(), 
                );
        $last_insert_id = $this->services_model->insert_this_services_cost($data_arr);

        $insert_data_arr = array(
                        'des_cribe' => $this->input->post('description'), 
                        'person_name' => $this->input->post('person_name'), 
                        'birth_date' => $this->input->post('birth_date'), 
                        'entry_time' => time(), 
                        'entry_date' => date('Y-m-d', time()), 
                        'user_iddd' => $this->user_id, 
                        'services_id ' => 4, 
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

    public function search_copy_view()
    {
        $this->data['div_info'] = $this->setting_model->getDivision();
        $user_group_id = $this->ion_auth->get_users_groups()->row()->id;
        $service_s_idd = '4';
        $this->data['service_rate'] = $this->services_model->get_services_list($service_s_idd, $user_group_id);
        $this->load->template('admin/search_view_file', $this->data);
    }

    public function set_username_password_request()
    {
        $user_group_id = $this->ion_auth->get_users_groups()->row()->id;
        $service_s_idd = '5';
        $this->data['service_rate'] = $this->services_model->get_services_list($service_s_idd, $user_group_id);
        $this->load->template('admin/user_pass_request_view', $this->data);
    }

    public function insert_user_pass_request()
    {
        $data_arr = array(
                    'cut_amount'    => $this->input->post('services_rate'), 
                    'cust_id'       => $this->user_id, 
                    'services_iidd' => 1, 
                    'time_s'        => time(), 
                );
        $last_insert_id = $this->services_model->insert_this_services_cost($data_arr);

        $insert_data_arr = array(
                        'nid_pin_no' => $this->input->post('nid_pin_number'), 
                        'nid_no' => $this->input->post('nid_number'), 
                        'birth_date' => $this->input->post('birth_date'), 
                        'entry_time' => time(), 
                        'entry_date' => date('Y-m-d', time()), 
                        'user_iddd' => $this->user_id, 
                        'services_id ' => 5, 
                        'payment_cut_a_iddd' => $last_insert_id
                    );
        $this->services_model->insert_services_data($insert_data_arr);
    }

    public function insert_porichoy_verify_data()
    {
        $data_arr = array(
                    'cut_amount'    => $this->input->post('services_rate'), 
                    'cust_id'       => $this->user_id, 
                    'services_iidd' => 9, 
                    'time_s'        => time(), 
                );
        $last_insert_id = $this->services_model->insert_this_services_cost($data_arr);

        $insert_data_arr = array(
                        'nid_no' => $this->input->post('nid_number_type'), 
                        'entry_time' => time(), 
                        'entry_date' => date('Y-m-d', time()), 
                        'user_iddd' => $this->user_id, 
                        'services_id ' => 5, 
                        'payment_cut_a_iddd' => $last_insert_id
                    );
        $this->services_model->insert_services_data($insert_data_arr);
    }

    public function nid_verify_data()
    {
        $nid_number_get = $this->input->post('nid_number_type');

        $headers = array(
            'Content-Type:application/json',
            'x-api-key:53c64d02-81d1-485b-97ba-b113ae251734',
        );

        $fields= array(
                    'national_id' => '1234567891',
                    'english_output' => true,
                );
        /////////////////////get jobs/////////////////

        $url_path="https://porichoy.azurewebsites.net/api/Kyc/test-nid-person-values";

        // $ch = curl_init($url_path);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // echo json_encode(curl_exec($ch));

        $ch = curl_init( $url_path );
        # Setup request to send json via POST.
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        # Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        # Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        # Print response.
        print_r($result) ;













        // echo $result_s;

        // $this->output->set_content_type('application/json');  

        // curl_close($ch);      
/* 
    
      if(curl_errno($ch)) {    
          echo 'Curl error: ' . curl_error($ch);  

          exit();  
      } else {    
          // check the HTTP status code of the request
            $resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($resultStatus != 200) {
                echo stripslashes($result_s);
                die('Request failed: HTTP status code: ' . $resultStatus);

            }
         $featured_jobs_array=(array)json_decode($result_s);
        //  print_r($featured_jobs_array);
         exit();
      } 
       */

    }


    

}