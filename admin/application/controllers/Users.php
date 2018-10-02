<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('users_mod');
    }

    public function index() {
        $data['dir'] = 'users';
        $data['page'] = 'index';
        $data['page_title'] = 'Users';
        $data['nav_path'] = array(0 => array('title' => 'Users', 'url' => ''));
        $data['rows'] = $this->users_mod->getUsers(false);
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function add_user() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_user')) {
                if ($this->users_mod->saveUser()) {
                    $this->session->set_flashdata('msg', 'User added successfully!');
                    redirect('users');
                }
            }
        }
        $data['dir'] = 'users';
        $data['page'] = 'user_form';
        $data['page_title'] = 'Users';
        $data['form_action'] = site_url('users/add_user/');
        $data['nav_path'] = array(0 => array('title' => 'Users', 'url' => site_url('users')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function is_valid_user() {
        if ($this->users_mod->isValidUser()) {
            $this->form_validation->set_message('is_valid_user', 'This User Name is not available.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function edit_user($user_id = '') {
        if ($user_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_user')) {
                if ($this->users_mod->updateUser()) {
                    $this->session->set_flashdata('msg', 'User updated successfully!');
                    redirect('users');
                }
            }
        }
        $data = $this->users_mod->getUserDetails($user_id);
        if ($data['user_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('user_id', $data['user_id']);
        $data['form_action'] = site_url('users/edit_user/' . $data['user_id']);
        $data['dir'] = 'users';
        $data['page'] = 'user_form';
        $data['page_title'] = 'Users';
        $data['nav_path'] = array(0 => array('title' => 'Users', 'url' => site_url('users')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_user($user_id = '') {
        if ($user_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->users_mod->deleteUser($user_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
