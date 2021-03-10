<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

    public function __construct()
    {
        parent::__construct();           
        $this->load->model('setting_model');
         
    }

    public function index()
    {
        $this->load->front('errors/not_found');
    }


    public function birth_data()
    {
        $serial = $this->input->get('serial');
        $dob = $this->input->get('dob');
        
        $result = $this->curl->simple_get('http://bdris.gov.bd/api/br/info/ubrn/'.$serial.'?dob='.$dob);
        echo $result;
        
        $this->output->set_content_type('application/json');        
    }
    
}

/* End of file Notfound.php */


