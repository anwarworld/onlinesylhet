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
        if (!Common::isLoggedIn()) {
            $url = $this->session->userdata('cur_uri');
            if (stripos($url, 'users') !== false) {
                redirect('home');
            }
            Common::redirect();
        }
        $this->load->library('form_validation');
        $this->load->model('users_mod');
    }

    public function index() {
        $data = Common::getSessionUserData();
        $data['dir'] = 'users';
        $data['page'] = 'index';
        $data['page_title'] = 'My Account';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'My Account', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function change_password() {

        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_change_password')) {
                if ($this->users_mod->changePassword()) {
                    $this->session->set_flashdata('msg', 'Your Password changed successfully.');
                    redirect('users/change_password');
                } else {
                    $this->session->set_flashdata('msg', 'Sorry! User Name or Password is invalid. please try again.');
                }
            }
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'users';
        $data['page'] = 'change_password';
        $data['page_title'] = 'Change Password';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'My Account', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function is_valid_old_password() {
        if (!$this->users_mod->isValidOldPassword()) {
            $this->form_validation->set_message('is_valid_old_password', 'Old Password is invalid.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function orders() {
        $data['msg'] = $this->session->flashdata('msg');
        $data['rows'] = $this->users_mod->getAllOrders(0, 10);
        $data['dir'] = 'users';
        $data['page'] = 'orders';
        $data['page_title'] = 'My Order List';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'My Account', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function order_details($order_id = '') {
        if ($order_id == '') {
            Common::redirect();
        }
        $data = $this->users_mod->getOrderDetails($order_id);
        if ($data['order_id'] == '') {
            Common::redirect();
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['rows'] = $this->users_mod->getAllOrders(0, 10);
        $data['dir'] = 'users';
        $data['page'] = 'order_details';
        $data['page_title'] = 'My Order List';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'My Account', 'url' => ''));
        $this->load->view('main', $data);
    }

}
