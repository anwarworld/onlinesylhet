<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('home_mod');
    }

    public function index() {
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $data['page_title'] = 'Home | Welcome to kintayniba.com';
        $data['sliders'] = $this->home_mod->getSliders();
        $data['latest_producs'] = Common::getLatestProducts();
        $this->load->view('main', $data);
    }

    public function welcome() {
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $data['page_title'] = 'Home | Welcome to kintayniba.com';
        $this->load->view('main_view', $data);
    }

}
