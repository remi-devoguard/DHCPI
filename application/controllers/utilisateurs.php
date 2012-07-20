<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utilisateurs extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }


    public function index() {
        $this->grocery_crud->set_table('utilisateurs');
        $this->grocery_crud->set_subject('Utilisateur');
        $this->grocery_crud->required_fields('Nom', 'Uid');
        $output = $this->grocery_crud->render();
        $this->load->view('main.php', $output);
    }


}
