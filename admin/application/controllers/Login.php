<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_mod');
    }

    public function index() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'signin')) {
            if ($this->form_validation->run('valid_login')) {
                if ($this->users_mod->isValidLogin()) {
                    redirect('dashboard');
                } else {
                    $data['msg'] = 'Sorry! User Name or Password is invalid. please try again.';
                }
            }
        }
        $data['page_title'] = 'Login';
        $this->load->view('login', $data);
    }

    function logout() {
        $this->users_mod->do_logout();
        redirect('login');
    }

    public function register() {
        $this->load->view('register');
    }

}
