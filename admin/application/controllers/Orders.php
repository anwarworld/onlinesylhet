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
        $data['msg'] = $this->session->flashdata('msg');
        $data['status_rows'] = $this->orders_mod->getDeliveryStatus();
        $data['man_rows'] = $this->orders_mod->getDeliveryMan();
        $data['nav_path'] = array(0 => array('title' => 'Orders', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function invoice($order_id = '') {
        if ($order_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->load->model('pages_mod');
        $data = $this->orders_mod->getOrderDetails($order_id);

        if ($data['order_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $data['info'] = $this->pages_mod->getSettings();
        $data['dir'] = 'orders';
        $data['page'] = 'invoice';
        $data['nav_path'] = array(array('title' => 'Orders', 'url' => site_url('orders')), array('title' => 'Invoice', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function invoice_print($order_id = '') {
        if ($order_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->load->model('pages_mod');
        $data = $this->orders_mod->getOrderDetails($order_id);
        if ($data['order_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $data['info'] = $this->pages_mod->getSettings();
        $data['dir'] = 'orders';
        $data['page'] = 'invoice_print';
        $data['nav_path'] = array(0 => array('title' => 'Orders', 'url' => ''));
        $this->load->view('orders/invoice_print', $data);
    }

    public function updateOrder() {
        $data['success'] = false;
        if ($this->form_validation->run('valid_order_update')) {
            if ($this->orders_mod->updateDeliveryOption()) {
                $data['success'] = true;
                $data['redirect_url'] = site_url('orders');
                $this->session->set_flashdata('msg', 'Order Delivery Status updated Successfully!');
            }
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

}
