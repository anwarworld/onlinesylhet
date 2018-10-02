<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
    }

    public function index() {
        $data['dir'] = 'dashboard';
        $data['page'] = 'index';
        $data['page_title'] = 'Dashboard';
        $this->load->view('main', $data);
    }

}
