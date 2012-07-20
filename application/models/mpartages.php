<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpartages extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get(){
        $query = $this->db->get('reseaux_partages');
        return $query;
    }

}