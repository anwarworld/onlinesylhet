<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contact_us
 *
 * @author user
 */
class Contact extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('contacts_mod');
        $this->load->library('form_validation');
    }

    public function index() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_contact')) {
                if ($this->contacts_mod->saveContact()) {
                    $this->session->set_flashdata('msg', 'Thank you. your contact is submitted successfully. We will come back you soon.');
                    redirect('contact');
                }
            }
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'contact';
        $data['page'] = 'index';
        $data['page_title'] = 'Contact Us';
        $data['cart_script'] = true;
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Contact Us', 'url' => ''));
        $this->load->view('main', $data);
    }

}
