<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sellers extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('sellers_mod');
    }

    public function index() {
        $data['dir'] = 'sellers';
        $data['page'] = 'index';
        $data['page_title'] = 'Sellers';
        $data['nav_path'] = array(0 => array('title' => 'Sellers', 'url' => ''));
        $data['rows'] = $this->sellers_mod->getSellers(false);
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function add_seller() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_seller')) {
                if ($this->sellers_mod->saveSeller()) {
                    redirect('sellers');
                }
            }
        }
        $data['dir'] = 'sellers';
        $data['page'] = 'seller_form';
        $data['page_title'] = 'Sellers';
        $data['form_action'] = site_url('sellers/add_seller/');
        $data['nav_path'] = array(0 => array('title' => 'Sellers', 'url' => site_url('sellers')), 1 => array('title' => 'Add Seller', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_seller($seller_id = '') {
        if ($seller_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_seller')) {
                if ($this->sellers_mod->updateSeller()) {
                    $this->session->set_flashdata('msg', 'Seller updated successfully!');
                    redirect('sellers');
                }
            }
        }
        $data = $this->sellers_mod->getSellerDetails($seller_id);
        if ($data['seller_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('seller_id', $data['seller_id']);
        $data['form_action'] = site_url('sellers/edit_seller/' . $data['seller_id']);
        $data['dir'] = 'sellers';
        $data['page'] = 'seller_form';
        $data['page_title'] = 'Sellers';
        $data['nav_path'] = array(0 => array('title' => 'Sellers', 'url' => site_url('sellers')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_seller($seller_id = '') {
        if ($seller_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->sellers_mod->deleteSeller($seller_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
