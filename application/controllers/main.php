<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('grocery_CRUD');

        include_once('CAS.php');
        phpCAS::client('2.0', 'cas.uhp-nancy.fr', 443, '/cas', false);
        phpCAS::setNoCasServerValidation();
        phpCAS::handleLogoutRequests(false);
    }

    public function index() {
        redirect('/machines', 'refresh');
    }

    public function vlans() {
        $this->grocery_crud->set_subject('Vlan');
        $this->grocery_crud->required_fields('IP', 'Netmask', 'DNS_1', 'Passerelle');
        $output = $this->grocery_crud->render();
        $this->load->view('main.php', $output);
    }

    public function utilisateurs() {
        $this->grocery_crud->set_subject('Utilisateur');
        $this->grocery_crud->required_fields('Nom', 'Uid');
        $output = $this->grocery_crud->render();
        $this->load->view('main.php', $output);
    }

    public function machines() {
        $this->grocery_crud->set_subject('Machine');
        $this->grocery_crud->required_fields('Nom', 'IP', 'Adresse_MAC', 'Date_Creation', 'Vlan');
        $this->grocery_crud->set_relation('Vlan', 'vlans', 'IP');
        $output = $this->grocery_crud->render();

        $this->load->view('main.php', $output);
    }

}
