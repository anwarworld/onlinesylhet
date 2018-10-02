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
        $data['latest_producs'] = Common::getProductsByType(4);
        $data['featured_producs'] = Common::getProductsByType(2);
        $data['deal_producs'] = Common::getProductsByType(3);
        $this->load->view('main', $data);
    }

    public function welcome() {
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $data['page_title'] = 'Home | Welcome to kintayniba.com';
        $this->load->view('main_view', $data);
    }

}
