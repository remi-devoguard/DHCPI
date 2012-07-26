<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutilisateurs extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    public function getPasswd($User){
        $this->db->select('utilisateurs.Password')
                ->from('utilisateurs')
                ->where('utilisateurs.Uid', $User);

        $query = $this->db->get();
        return $query->row();
    }

}