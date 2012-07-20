<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mvlans extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $query = $this->db->get('vlans');
        return $query;
    }

    public function getEmptyShare() {
        $query = $this->db->get_where('vlans', array('reseaux_partages' => NULL));
        return $query;
    }
    
    public function getAllFromPartages($partage){
        $query = $this->db->get_where('vlans', array('reseaux_partages' => $partage));
        return $query;
    }

}