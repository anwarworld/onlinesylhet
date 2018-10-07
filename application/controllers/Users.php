<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author user
 */
class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_mod');
    }

    public function signin() {
        $this->load->library('form_validation');
        $data['success'] = false;
        if ($this->form_validation->run('valid_signin')) {
            if ($this->users_mod->isValidLogin()) {
                $data['success'] = true;
                $data['redirect_url'] = site_url('myaccounts');
            }
        }
        echo json_encode($data);
    }

    public function signup() {
        $this->load->library('form_validation');
        $data['success'] = false;
        if ($this->form_validation->run('valid_signup')) {
            if ($this->users_mod->isValidLogin()) {
                $data['success'] = 'Thank you. your review is submitted successfully.';
            }
        }
        echo json_encode($data);
    }

    function signout() {
        $this->users_mod->do_logout();
        Common::redirect();
    }

}
