<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('orders_mod');
    }

    public function index() {
        //       Pagination start
        $this->load->library("pagination");
        $start = $this->uri->segment(3);
        if ($start == '') {
            $start = 0;
        }
        $total_rows = $this->orders_mod->getTotalOrders();
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('orders/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 20;
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active">';
        $config['cur_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item disabled">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();
        $data['rows'] = $this->orders_mod->getOrders(true, $start, $config['per_page']);
//       Pagination End
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
