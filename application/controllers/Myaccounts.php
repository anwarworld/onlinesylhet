<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Myaccounts
 *
 * @author user
 */
class Myaccounts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_mod');
    }

    public function index() {

        $data['dir'] = 'carts';
        $data['page'] = 'index';
        $data['page_title'] = 'Cart';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Products', 'url' => site_url('products')), array('title' => 'View Cart', 'url' => ''));

        $this->load->view('main', $data);
    }

}
