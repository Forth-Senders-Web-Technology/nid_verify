<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->model('setting_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		$this->load->template('welcome_message');
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

    public function home_page_active()
    {
        $arrayData_s = array(
                    'home_page_ISactive' => 1,
                );
            $this->setting_model->update_setting_s($arrayData_s);
        echo '<center><h1> Now Home Page is Active </h1></center>';
    }
	
}
