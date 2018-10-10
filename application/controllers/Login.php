<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author user
 */
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_mod');
        $this->load->library('form_validation');
    }

    public function index() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_signin')) {
                if ($this->login_mod->isValidLogin()) {
                    redirect('users');
                }
            }
        }
        $data['dir'] = 'login';
        $data['page'] = 'index';
        $data['page_title'] = 'Login';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Login', 'url' => ''));

        $this->load->view('main', $data);
    }

    public function signin() {
        $data['success'] = false;
        if ($this->form_validation->run('valid_signin')) {
            if ($this->login_mod->isValidLogin()) {
                $data['success'] = true;
                $data['redirect_url'] = site_url('users');
            }
        }
        echo json_encode($data);
    }

    public function signup() {
        $data['success'] = false;
        if ($this->form_validation->run('valid_signup')) {
            if ($this->login_mod->saveUser()) {
                $data['success'] = true;
                $data['redirect_url'] = site_url('users');
            }
        } else {
            $data['msg'] = validation_errors();
        }
        echo json_encode($data);
    }

    public function is_valid_user() {
        if ($this->login_mod->isValidUser()) {
            $this->form_validation->set_message('is_valid_user', 'You have already an account using email/mobile.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function signout() {
        $this->login_mod->do_logout();
        Common::redirect();
    }

}
