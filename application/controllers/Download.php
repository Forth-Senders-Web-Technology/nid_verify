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

        $this->data['setting_info'] = $this->setting_model->getSetting();
    }

    public function porichoy_verify()
    {
        $data_arr = $this->input->post('data_arr');
		$object['voter_info'] = $data_arr;

var_dump($object['voter_info']);
var_dump($object['voter_info']->name);


/* 
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
        
		$fileName = '0.pdf';
		$mpdf->defaultheaderline = 0;
		$mpdf->defaultfooterline = 0;
		// $mpdf->SetHeader('Document Title|Center Text|{PAGENO}');
		// $mpdf->SetFooter('Document Title');
		$stylesheet = file_get_contents(FCPATH.'inc/style/mpdfStyle.css'); // external css
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html,2);
        $mpdf->Output($fileName,'D'); 

 */
    }


    public function card_file()
    {
       $html = $this->load->view('download/card_view_file', '', true);




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
        
		$fileName = '0.pdf';
		$mpdf->defaultheaderline = 0;
		$mpdf->defaultfooterline = 0;
		// $mpdf->SetHeader('Document Title|Center Text|{PAGENO}');
		// $mpdf->SetFooter('Document Title');
		$stylesheet = file_get_contents(FCPATH.'inc/style/mpdfStyle.css'); // external css
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html,2);
        $mpdf->Output(); 

// $fileName,'D'


    }


}