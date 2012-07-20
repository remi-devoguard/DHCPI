<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Machines extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->grocery_crud->set_table('machines');
        $this->grocery_crud->set_subject('Machine');
        $this->grocery_crud->required_fields('Nom', 'IP','Nom', 'Adresse_MAC', 'Date_Creation', 'Vlan');
        $this->grocery_crud->set_relation('Vlan', 'vlans', 'IP');
        $this->grocery_crud->order_by('IP');
        $output = $this->grocery_crud->render();

        $this->load->view('main.php', $output);
    }

}
