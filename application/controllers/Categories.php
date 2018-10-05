<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categories_mod');
    }

    public function index() {
        $data['dir'] = 'categories';
        $data['page'] = 'index';
        $data['page_title'] = 'Categories';
        $data['shop_script'] = true;
        $this->load->view('main', $data);
    }
}
