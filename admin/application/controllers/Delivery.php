<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('delivery_mod');
    }

    public function index() {
        $this->load->helper('text');
        $data['dir'] = 'delivery';
        $data['page'] = 'index';
        $data['page_title'] = 'Delivery Methods';
        $data['nav_path'] = array(0 => array('title' => 'Delivery Methods', 'url' => ''));
        $data['rows'] = $this->delivery_mod->getDelivery(false);
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function add_delivery() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_delivery_method')) {
                if ($this->delivery_mod->saveDelivery()) {
                    redirect('delivery');
                }
            }
        }
        $data['dir'] = 'delivery';
        $data['page'] = 'delivery_form';
        $data['page_title'] = 'Add Delivery Method';
        $data['form_action'] = site_url('delivery/add_delivery/');
        $data['nav_path'] = array(0 => array('title' => 'Delivery Methods', 'url' => site_url('delivery')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_delivery($method_id = '') {
        if ($method_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_delivery_method')) {
                if ($this->delivery_mod->updateDelivery()) {
                    $this->session->set_flashdata('msg', 'Delivery updated successfully!');
                    redirect('delivery');
                }
            }
        }
        $data = $this->delivery_mod->getDeliveryDetails($method_id);
        if ($data['method_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('method_id', $data['method_id']);
        $data['form_action'] = site_url('delivery/edit_delivery/' . $data['method_id']);
        $data['dir'] = 'delivery';
        $data['page'] = 'delivery_form';
        $data['page_title'] = 'Edit Delivery Method';
        $data['nav_path'] = array(0 => array('title' => 'Delivery Methods', 'url' => site_url('delivery')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_delivery($method_id = '') {
        if ($method_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->delivery_mod->deleteDelivery($method_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
