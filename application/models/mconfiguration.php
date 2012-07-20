<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mconfiguration extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get(){
        $query = $this->db->get('configuration');
        return $query;
    }

}