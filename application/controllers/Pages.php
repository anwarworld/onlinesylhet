<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pages
 *
 * @author user
 */
class Pages extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function about_us() {
        $data['dir'] = 'pages';
        $data['page'] = 'about_us';
        $data['page_title'] = 'About Us';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'About Us', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function delivery_and_return() {
        $data['dir'] = 'pages';
        $data['page'] = 'delivery_and_return';
        $data['page_title'] = 'Delivery & Return';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Delivery & Return', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function privacy_policy() {
        $data['dir'] = 'pages';
        $data['page'] = 'privacy_policy';
        $data['page_title'] = 'Privacy Policy';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Privacy Policy', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function payment() {
        $data['dir'] = 'pages';
        $data['page'] = 'payment';
        $data['page_title'] = 'Payment Process';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Payment Process', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function faq() {
        $data['dir'] = 'pages';
        $data['page'] = 'faq';
        $data['page_title'] = 'FAQ';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'FAQ', 'url' => ''));
        $this->load->view('main', $data);
    }

}
