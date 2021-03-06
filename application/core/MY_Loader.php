<?php

/**
 * /application/core/MY_Loader.php
 *
 */


class MY_Loader extends CI_Loader {

    public function __construct()
    {
        
    }

    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
            $content  = $this->view('partial/header', $vars, $return);
            $content  = $this->view('partial/sidebar', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('partial/footer', $vars, $return);

            return $content;
        else:
            $this->view('partial/header', $vars);
            $this->view('partial/sidebar', $vars);
            $this->view($template_name, $vars);
            $this->view('partial/footer', $vars);
        endif;
    }

    public function front($view_file, $vars = array(), $return = FALSE)
    {
        if($return):
            $content  = $this->view('partial/header', $vars, $return);
            $content .= $this->view($view_file, $vars, $return);
            $content .= $this->view('partial/footer', $vars, $return);

            return $content;
        else:
            $this->view('partial/header', $vars);
            $this->view($view_file, $vars);
            $this->view('partial/footer', $vars);
        endif;
    }
    
}
