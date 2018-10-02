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

    public function details($category_id = '') {
        if ($category_id == '') {
            Common::redirect();
        }
        $data = $this->categories_mod->getCategoryDetails($category_id);
        if ($data['category_id'] == '') {
            Common::redirect();
        }
        $data['dir'] = 'categories';
        $data['page'] = 'details';
        $data['page_title'] = 'Categories | ' . $data['category_name'];
        $data['shop_script'] = true;
        $this->load->view('main', $data);
    }

}
