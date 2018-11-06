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

    public function all() {
        $data = Common::getCategories();
        $dataArray = array();
        foreach ($data as $value) {
            $temp = $value;
            $temp['subCategories'] = array();
            if (is_array($value['subCategories'])) {
                foreach ($value['subCategories'] as $sub) {
                    $temp['subCategories'][] = $sub;
                }
            }
            $dataArray[] = $temp;
        }
//        print("<pre>" . print_r($dataArray, true) . "</pre>");
        echo json_encode($dataArray);
    }

}
