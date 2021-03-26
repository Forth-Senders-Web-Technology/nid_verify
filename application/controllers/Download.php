<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


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
        $data_arr = $this->input->post('data_arr');
		$object['voter_info'] = json_decode($data_arr);

        $headers = array(
            'Content-Type:application/json',
            'x-api-key:53c64d02-81d1-485b-97ba-b113ae251734',
        );

        $fields= array(
					"person_dob" => $object['voter_info']->voter->dob,
					"national_id" => "19911515395000337",
					"person_fullname" => $object['voter_info']->voter->name,
				
                );
        /////////////////////get jobs/////////////////

        $url_path="https://porichoy.azurewebsites.net/api/Kyc/test-nid-person-sig";

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
		$object['sign'] = json_decode($result);



		$html = $this->load->view('download/download_porichoy_verify', $object, true);
		
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

		// $fileName,'D'
		
    }


    public function card_file()
    {
        $data_arr = $this->input->post('data_arr');
		$object['voter_info'] = json_decode($data_arr);

        $headers = array(
            'Content-Type:application/json',
            'x-api-key:53c64d02-81d1-485b-97ba-b113ae251734',
        );

        $fields= array(
					"person_dob" => $object['voter_info']->voter->dob,
					"national_id" => "19911515395000337",
					"person_fullname" => $object['voter_info']->voter->name,
				
                );
        /////////////////////get jobs/////////////////

        $url_path="https://porichoy.azurewebsites.net/api/Kyc/test-nid-person-sig";

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
		$object['sign'] = json_decode($result);



       $html = $this->load->view('download/card_view_file', $object, true);




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
        
		$fileName = 'nid_'.$$object['voter_info']->voter->nameEn.'_card.pdf';
		$mpdf->defaultheaderline = 0;
		$mpdf->defaultfooterline = 0;
		// $mpdf->SetHeader('Document Title|Center Text|{PAGENO}');
		// $mpdf->SetFooter('Document Title');
		$stylesheet = file_get_contents(FCPATH.'inc/style/mpdfStyle.css'); // external css
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html,2);
        $mpdf->Output($fileName,'D'); 

    }


}