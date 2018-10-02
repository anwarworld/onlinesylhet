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
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->helper('file');
        $this->load->model('pages_mod');
    }

    public function index() {
        $data['dir'] = 'pages';
        $data['page'] = 'index';
        $data['page_title'] = 'Pages';
        $data['rows'] = $this->pages_mod->getPages();
        $data['nav_path'] = array(array('title' => 'Pages', 'url' => ''));
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function about_us() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->pages_mod->savePage()) {
                $this->session->set_flashdata('msg', 'Page updated successfully!');
                redirect('pages');
            }
        }
        $data['dir'] = 'pages';
        $data['page'] = 'page_form';
        $data['page_title'] = 'About Us';
        $data['page_name'] = 'about_us';
        $data['txt_editor'] = true;
        $data['page_des'] = read_file(FRONT_END . "views/pages/" . $data['page_name'] . ".php");
        $data['form_action'] = site_url('pages/about_us');
        $data['nav_path'] = array(array('title' => 'Pages', 'url' => site_url('pages')), array('title' => 'About Us', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function delivery_and_return() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->pages_mod->savePage()) {
                $this->session->set_flashdata('msg', 'Page updated successfully!');
                redirect('pages');
            }
        }
        $data['dir'] = 'pages';
        $data['page'] = 'page_form';
        $data['page_title'] = 'Delivery & Return';
        $data['page_name'] = 'delivery_and_return';
        $data['txt_editor'] = true;
        $data['page_des'] = read_file(FRONT_END . "views/pages/" . $data['page_name'] . ".php");
        $data['form_action'] = site_url('pages/delivery_and_return');
        $data['nav_path'] = array(array('title' => 'Pages', 'url' => site_url('pages')), array('title' => 'About Us', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function privacy_policy() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->pages_mod->savePage()) {
                $this->session->set_flashdata('msg', 'Page updated successfully!');
                redirect('pages');
            }
        }
        $data['dir'] = 'pages';
        $data['page'] = 'page_form';
        $data['page_title'] = 'Privacy Policy';
        $data['page_name'] = 'privacy_policy';
        $data['txt_editor'] = true;
        $data['page_des'] = read_file(FRONT_END . "views/pages/" . $data['page_name'] . ".php");
        $data['form_action'] = site_url('pages/privacy_policy');
        $data['nav_path'] = array(array('title' => 'Pages', 'url' => site_url('pages')), array('title' => 'About Us', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function payment() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->pages_mod->savePage()) {
                $this->session->set_flashdata('msg', 'Page updated successfully!');
                redirect('pages');
            }
        }
        $data['dir'] = 'pages';
        $data['page'] = 'page_form';
        $data['page_title'] = 'Payment Process';
        $data['page_name'] = 'payment';
        $data['txt_editor'] = true;
        $data['page_des'] = read_file(FRONT_END . "views/pages/" . $data['page_name'] . ".php");
        $data['form_action'] = site_url('pages/payment');
        $data['nav_path'] = array(array('title' => 'Pages', 'url' => site_url('pages')), array('title' => 'About Us', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function faq() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->pages_mod->savePage()) {
                $this->session->set_flashdata('msg', 'Page updated successfully!');
                redirect('pages');
            }
        }
        $data['dir'] = 'pages';
        $data['page'] = 'page_form';
        $data['page_title'] = 'FAQ';
        $data['page_name'] = 'faq';
        $data['txt_editor'] = true;
        $data['page_des'] = read_file(FRONT_END . "views/pages/" . $data['page_name'] . ".php");
        $data['form_action'] = site_url('pages/faq');
        $data['nav_path'] = array(array('title' => 'Pages', 'url' => site_url('pages')), array('title' => 'FAQ', 'url' => ''));
        $this->load->view('main', $data);
    }

}
