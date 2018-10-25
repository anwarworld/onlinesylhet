<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('dashboard_mod');
    }

    public function index() {
        $data['users'] = $this->dashboard_mod->getNewUsers();
        $data['orders'] = $this->dashboard_mod->getNewOrders();
        $data['dir'] = 'dashboard';
        $data['page'] = 'index';
        $data['page_title'] = 'Dashboard';
        $this->load->view('main', $data);
    }

}
