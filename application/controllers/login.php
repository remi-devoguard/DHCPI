<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->login();
    }

    public function login() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('Login', 'Login', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login.php');
        } else {
            $User = $this->input->post('Login');
            if ($this->checkPasswd($User)) {
                $_SESSION['User'] = $User;
                redirect(site_url(), 'refresh');
            } else {
                redirect(site_url('login'), 'refresh');
            }
        }
    }

    public function logout() {
        if(isset($_SESSION['User'])){ 
            unset($_SESSION['User']);
        }
        redirect(site_url(), 'refresh');
    }

    private function checkPasswd($User) {
        $this->load->model('mutilisateurs');
        $result = $this->mutilisateurs->getPasswd($User);
        if ($result->Password == sha1($this->input->post('Password') . $this->config->item('encryption_key'))) {
            return true;
        } else {
            return false;
        }
    }

}