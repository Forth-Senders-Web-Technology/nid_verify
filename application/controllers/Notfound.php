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
}

/* End of file Notfound.php */


