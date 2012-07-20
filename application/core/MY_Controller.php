<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('grocery_CRUD');

        include_once('CAS.php');
        phpCAS::client('2.0', 'cas.uhp-nancy.fr', 443, '/cas', false);
        phpCAS::setNoCasServerValidation();
        phpCAS::handleLogoutRequests(false);
    }
}