<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Partages extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->grocery_crud->set_table('reseaux_partages');
        $this->grocery_crud->set_subject('groupement réseaux');
        $this->grocery_crud->required_fields('Nom');
        $output = $this->grocery_crud->render();
        $this->load->view('main.php', $output);
    }

}