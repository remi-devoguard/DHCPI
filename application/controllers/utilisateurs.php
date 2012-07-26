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
        $this->grocery_crud->required_fields('Nom', 'Uid', 'Password');
        $this->grocery_crud->change_field_type('Password', 'password');
        $this->grocery_crud->callback_before_insert(array($this, 'encrypt_password_callback'));
        $this->grocery_crud->callback_before_update(array($this, 'encrypt_password_callback'));
        $output = $this->grocery_crud->render();
        $this->load->view('main.php', $output);
    }

    function encrypt_password_callback($post_array, $primary_key = null) {
        $post_array['Password'] = sha1($post_array['Password'].$this->config->item('encryption_key'));
        return $post_array;
    }

}
