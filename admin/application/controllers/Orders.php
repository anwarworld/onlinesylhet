<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
    }

    public function index() {
        $data['dir'] = 'orders';
        $data['page'] = 'index';
        $data['nav_path'] = array(0 => array('title' => 'Orders', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function invoice() {
        $data['dir'] = 'orders';
        $data['page'] = 'invoice';
        $data['nav_path'] = array(0 => array('title' => 'Orders', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function invoice_print() {
        $data['dir'] = 'orders';
        $data['page'] = 'invoice_print';
        $data['nav_path'] = array(0 => array('title' => 'Orders', 'url' => ''));
        $this->load->view('main', $data);
    }

}
