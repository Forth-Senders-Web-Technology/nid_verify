<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    
    'protocol'      => 'smtp',
    'smtp_host'     => 'smtp.googlemail.com',
    'smtp_port'     => 465,
    'smtp_user'     => 'ictin.net@gmail.com',
    'smtp_pass'     => 'Kolopona.123',
    'mailtype'      => 'html', 
    'charset'       => 'iso-8859-1',
    'smtp_crypto'   => 'ssl', //can be 'ssl' or 'tls' for example
    'smtp_timeout'  => '4', //in seconds
    'wordwrap'      => TRUE

);
