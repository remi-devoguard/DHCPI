<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        //$this->output->enable_profiler(TRUE);
         $this->ci = & get_instance();
         session_start();
        if(!$this->isLogged() && $this->ci->uri->segment(1)!='login'){redirect(site_url('login'), 'refresh');}
    }
    
    
    private function isLogged() {
        if (isset($_SESSION['User'])) {
            return true;
        } else {
            return false;
        }
    }
}