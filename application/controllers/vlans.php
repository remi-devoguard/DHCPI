<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vlans extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->grocery_crud->set_table('vlans');
        $this->grocery_crud->set_subject('Vlan');
        $this->grocery_crud->set_relation('reseaux_partages', 'reseaux_partages', 'Nom');
        $this->grocery_crud->unset_texteditor('options_vlans', 'full_text');
        $this->grocery_crud->required_fields('IP', 'Netmask');
        $output = $this->grocery_crud->render();
        $this->load->view('main.php', $output);
    }

    public function partage() {
        $this->grocery_crud->set_table('reseaux_partages');
        $this->grocery_crud->set_subject('groupement réseaux');
        $output = $this->grocery_crud->render();
        $this->load->view('main.php', $output);
    }

}