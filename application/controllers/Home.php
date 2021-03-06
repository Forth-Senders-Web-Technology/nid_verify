<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();           
        $this->load->model('setting_model');
         
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
}

/* End of file Home.php */
