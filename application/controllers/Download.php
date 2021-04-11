<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use BigFish\PDF417\PDF417;
use BigFish\PDF417\Renderers\ImageRenderer;
use BigFish\PDF417\Renderers\SvgRenderer;


class CustomLanguageToFontImplementation extends \Mpdf\Language\LanguageToFont
{

    public function getLanguageOptions($llcc, $adobeCJK)
    {
        if ($llcc === 'th') {
            return [false, 'solaimanlipi']; // for thai language, font is not core suitable and the font is Frutiger
        }

        return parent::getLanguageOptions($llcc, $adobeCJK);
    }

}



class BanglaConverter {

    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    
    public static function bn2en($number) {
        return str_replace(self::$bn, self::$en, $number);
    }
    
    public static function en2bn($number) {
        return str_replace(self::$en, self::$bn, $number);
    }

	public static function base64ToImage($base64_string, $output_file) {
		$file = fopen($output_file, "wb");
	
		$data = explode(',', $base64_string);
	
		fwrite($file, base64_decode($data[1]));
		fclose($file);
	
		return $output_file;
	}
    
}



class Download extends CI_Controller {


    public function __construct()
    {
        parent::__construct();           
		
        $this->load->library('Ion_auth');
        $this->load->model('setting_model');
        $this->load->model('services_model');
        $this->load->model('user_model');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('user_agent');
        $this->load->library('email');

        if (!$this->ion_auth->logged_in()) {
            redirect('logout', 'refresh');
        }

        $this->data['setting_info'] = $this->setting_model->getSetting();
    }

    public function porichoy_verify()
    {
		// Get Json Data From View File
        $data_arr = $this->input->post('data_arr');
        $object['nid_no_type'] = $this->input->post('nid_typing_data');
		
		// Decode Json Data 
		$object['voter_info'] = json_decode($data_arr);

		// PHP Curl for get Signature
        $headers = array(
            'Content-Type:application/json',
            'x-api-key:53c64d02-81d1-485b-97ba-b113ae251734',
        );

        $fields= array(
					"person_dob" => $object['voter_info']->voter->dob,
					"national_id" => $object['nid_no_type'],
					"person_fullname" => $object['voter_info']->voter->name,
				
                );
        /////////////////////get jobs/////////////////

		// Signature URL
        $url_path="https://porichoy.azurewebsites.net/api/Kyc/nid-person-sig";

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
        # Store Signature in Variable
		$object['signa_ture'] = json_decode($result);
		// PHP Curl for get Signature


		// This is View File
		$html = $this->load->view('download/download_porichoy_verify', $object, true);
		


		
		// Genarate mpdf File
		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];

		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];

		
		$mpdf = new \Mpdf\Mpdf([
			'format'=>'A4',
			'orientation'=>'P',
			'languageToFont' => new CustomLanguageToFontImplementation(),
			'fontDir' => array_merge($fontDirs, ['/fonts']),
			'fontdata' => $fontData + [
				'solaimanlipi' => [
					'R' => 'SolaimanLipi.ttf',
					'useOTL' => 0xFF,
                ],
				'bangla' => [
					'R' => 'Bangla.ttf',
                    'I' => "Bangla.ttf",
                ],
				'nikosh' => [
					'R' => 'Nikosh.ttf',
                    'I' => "Nikosh.ttf",
				]
			],
			'default_font' => 'solaimanlipi'
        ]);
        
		$fileName = $object['voter_info']->voter->nameEn.'.pdf';
		$mpdf->defaultheaderline = 0;
		$mpdf->defaultfooterline = 0;
		// $mpdf->SetHeader('Document Title|Center Text|{PAGENO}');
		// $mpdf->SetFooter('Document Title');
		$stylesheet = file_get_contents(FCPATH.'inc/style/mpdfStyle.css'); // external css
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html,2);
        $mpdf->Output($fileName,'D'); 
		// Genarate mpdf File
		
    }


    public function card_file()
    {
		// Get json data from view file
        $data_arr = $this->input->post('data_arr');

        $object['nid_no_type'] = $this->input->post('nid_typing_data');

		// decode json data
		$object['voter_info'] = json_decode($data_arr);


		// PHP Curl for get Signature
        $headers = array(
            'Content-Type:application/json',
            'x-api-key:53c64d02-81d1-485b-97ba-b113ae251734',
        );

        $fields= array(
					"person_dob" => $object['voter_info']->voter->dob,
					"national_id" => $object['nid_no_type'],
					"person_fullname" => $object['voter_info']->voter->name,
				
                );
        /////////////////////get jobs/////////////////
		// Signature Url
        $url_path="https://porichoy.azurewebsites.net/api/Kyc/nid-person-sig";

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
        # store signature in variable
		$object['sign'] = json_decode($result);
		// PHP Curl for get Signature


		// Genarate Barcode for This NID Card
		// barcode Content
		$string_for_barcode = "<pin>".$object['nid_no_type']."</pin><name> ".$object['voter_info']->voter->nameEn." </name><DOB>".date('d M Y', strtotime($object['voter_info']->voter->dob))."</DOB><FP></FP><F>Right Index</F><TYPE>A</TYPE><V>2.0</V><ds>302c0214733766837d7afc3514acc6b182cde5a8a8225dba02143ca6d1a777859b362102c2cda54407834ee0c7f2</ds>";
		// barcode Content


		$pdf417 = new PDF417();
		$data = $pdf417->encode($string_for_barcode);

		// Create a URL image, for barcode
		$renderer = new ImageRenderer([
			'format' => 'data-url',
			'color' => '#000000',
			'bgColor' => '#FFFFFF',
			'scale' => 20,
			'quality' => 90
		]);
		$img = $renderer->render($data);

		$object['pdf417_barcode'] = $renderer->render($data);
		// Genarate Barcode for This NID Card




		// This is View File
       $html = $this->load->view('download/card_view_file', $object, true);


		// Genarate mpdf file 
		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];

		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];
		
		$mpdf = new \Mpdf\Mpdf([
			'format'=>'A4',
			'orientation'=>'P',
			'languageToFont' => new CustomLanguageToFontImplementation(),
			'fontDir' => array_merge($fontDirs, ['/fonts']),
			'fontdata' => $fontData + [
				'solaimanlipi' => [
					'R' => 'SolaimanLipi.ttf',
					'useOTL' => 0xFF,
                ],
				'bangla' => [
					'R' => 'Bangla.ttf',
                    'I' => "Bangla.ttf",
                ],
				'nikosh' => [
					'R' => 'Nikosh.ttf',
                    'I' => "Nikosh.ttf",
				],
				'Arial' => [
					'R' => 'Arial.woff',
                    'I' => "Arial.woff",
                ],
			],
			'default_font' => 'solaimanlipi'
        ]);
        
		$fileName = 'nid_'.$object['voter_info']->voter->nameEn.'_card.pdf';
		$mpdf->defaultheaderline = 0;
		$mpdf->defaultfooterline = 0;
		// $mpdf->SetHeader('Document Title|Center Text|{PAGENO}');
		// $mpdf->SetFooter('Document Title');
		$stylesheet = file_get_contents(FCPATH.'inc/style/mpdfStyle.css'); // external css
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html,2);
        $mpdf->Output($fileName,'D');
		// Genarate mpdf file 

	}

	public function create_card_by_submit_info()
	{		
        $serive_group_rates = $this->input->post('serive_group_rates');

        $data_arr = array(
					'cut_amount'    => $serive_group_rates, 
					'cust_id'       => $this->ion_auth->user()->row()->user_full_tbl_id, 
					'services_iidd' => 10,
					'time_s'        => time(), 
				);
		$last_insert_id = $this->services_model->insert_this_services_cost($data_arr);

		$obj_data['bn_name'] 		= $this->input->post('bn_name');
        $obj_data['en_name'] 		= $this->input->post('en_name');
        $obj_data['f_name'] 		= $this->input->post('f_name');
        $obj_data['m_name'] 		= $this->input->post('m_name');
        $obj_data['dob'] 			= $this->input->post('dob');
        $obj_data['nid_no'] 		= $this->input->post('nid_no');
        $obj_data['pr_address'] 	= $this->input->post('address');
        $obj_data['nid_pin_no'] 	= $this->input->post('nid_pin_no');
        $obj_data['blood_group'] 	= $this->input->post('blood_group');
        $obj_data['birth_place'] 	= $this->input->post('birth_place');

		$obj_data['pic_data'] = base64_encode(file_get_contents( $_FILES["pic_file"]["tmp_name"] ));
		$obj_data['sign_data'] = base64_encode(file_get_contents( $_FILES["sign_file"]["tmp_name"] ));


		// Genarate Barcode for This NID Card
		// barcode Content
		$string_for_barcode = "<pin>".$obj_data['nid_pin_no']."</pin><name> ".$obj_data['en_name']." </name><DOB>".date('d M Y', strtotime($obj_data['dob']))."</DOB><FP></FP><F>Right Index</F><TYPE>A</TYPE><V>2.0</V><ds>302c0214733766837d7afc3514acc6b182cde5a8a8225dba02143ca6d1a777859b362102c2cda54407834ee0c7f2</ds>";
		// barcode Content


		$pdf417 = new PDF417();
		$data = $pdf417->encode($string_for_barcode);

		// Create a URL image, for barcode
		$renderer = new ImageRenderer([
			'format' => 'data-url',
			'color' => '#000000',
			'bgColor' => '#FFFFFF',
			'scale' => 20,
			'quality' => 90
		]);
		$img = $renderer->render($data);

		$obj_data['pdf417_barcode'] = $renderer->render($data);
		// Genarate Barcode for This NID Card




		// This is View File
       $html = $this->load->view('download/create_card_by_input_data', $obj_data, true);


		// Genarate mpdf file 
		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];

		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];
		
		$mpdf = new \Mpdf\Mpdf([
			'format'=>'A4',
			'orientation'=>'P',
			'languageToFont' => new CustomLanguageToFontImplementation(),
			'fontDir' => array_merge($fontDirs, ['/fonts']),
			'fontdata' => $fontData + [
				'solaimanlipi' => [
					'R' => 'SolaimanLipi.ttf',
					'useOTL' => 0xFF,
                ],
				'bangla' => [
					'R' => 'Bangla.ttf',
                    'I' => "Bangla.ttf",
                ],
				'nikosh' => [
					'R' => 'Nikosh.ttf',
                    'I' => "Nikosh.ttf",
				],
				'Arial' => [
					'R' => 'Arial.woff',
                    'I' => "Arial.woff",
                ],
			],
			'default_font' => 'solaimanlipi'
        ]);
        
		$fileName = 'nid_'.$obj_data['nid_no'].'_card.pdf';
		$mpdf->defaultheaderline = 0;
		$mpdf->defaultfooterline = 0;
		// $mpdf->SetHeader('Document Title|Center Text|{PAGENO}');
		// $mpdf->SetFooter('Document Title');
		$stylesheet = file_get_contents(FCPATH.'inc/style/mpdfStyle.css'); // external css
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html,2);
        $mpdf->Output($fileName,'D');
		// Genarate mpdf file 


	}

}