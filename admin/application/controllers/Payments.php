<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('payments_mod');
    }

    public function index() {
        $data['dir'] = 'payments';
        $data['page'] = 'index';
        $data['page_title'] = 'Payment Methods';
        $data['nav_path'] = array(0 => array('title' => 'Payment Methods', 'url' => ''));
        $data['rows'] = $this->payments_mod->getPayments(false);
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function add_payment() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_payment_method')) {
                if ($this->payments_mod->savePayment()) {
                    redirect('payments');
                }
            }
        }
        $data['dir'] = 'payments';
        $data['page'] = 'payment_form';
        $data['page_title'] = 'Add Payment Method';
        $data['form_action'] = site_url('payments/add_payment/');
        $data['nav_path'] = array(0 => array('title' => 'Payment Methods', 'url' => site_url('payments')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_payment($method_id = '') {
        if ($method_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_payment_method')) {
                if ($this->payments_mod->updatePayment()) {
                    $this->session->set_flashdata('msg', 'Payment updated successfully!');
                    redirect('payments');
                }
            }
        }
        $data = $this->payments_mod->getPaymentDetails($method_id);
        if ($data['method_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('method_id', $data['method_id']);
        $data['form_action'] = site_url('payments/edit_payment/' . $data['method_id']);
        $data['dir'] = 'payments';
        $data['page'] = 'payment_form';
        $data['page_title'] = 'Edit Payment Method';
        $data['nav_path'] = array(0 => array('title' => 'Payment Methods', 'url' => site_url('payments')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_payment($method_id = '') {
        if ($method_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->payments_mod->deletePayment($method_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
