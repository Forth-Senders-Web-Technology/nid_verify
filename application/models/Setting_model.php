<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get Setting in One Function
    public function getSetting()
    {
        $sql = $this->db->get('setting');
        return $sql->row();
    }

    public function getDivision()
    {
        $sql = $this->db->get('div_list');
        return $sql->result();
    }

    // get district list by division ID
    public function getDistrict($div_id)
    {
        $this->db->where('division_id', $div_id);
        $sql = $this->db->get('dist_list');
        return $sql->result();        
    }

    // get Upazilla list by District ID
    public function getUpazilla($dist_id)
    {
        $this->db->where('district_id', $dist_id);
        $sql = $this->db->get('up_list');
        return $sql->result();        
    }

    // get Union list by Upazilla ID
    public function getUnion($upid)
    {
        $this->db->where('upazilla_id', $upid);
        $sql = $this->db->get('un_list');
        return $sql->result();        
    }

    public function update_setting_s($arrayData_s)
    {
        $this->db->where('setting_idd', 1);
        $this->db->update('setting', $arrayData_s);
    }
    
}

/* End of file Setting_model.php */
