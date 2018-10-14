<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sellers extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('sellers_mod');
    }

    public function index() {
        //       Pagination start
        $this->load->library("pagination");
        $start = $this->uri->segment(3);
        if ($start == '') {
            $start = 0;
        }
        $total_rows = $this->sellers_mod->getTotalSellers();
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('categories/index');
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
        $data['rows'] = $this->sellers_mod->getSellers(true, $start, $config['per_page']);
//       Pagination End
        $data['dir'] = 'sellers';
        $data['page'] = 'index';
        $data['page_title'] = 'Sellers';
        $data['nav_path'] = array(0 => array('title' => 'Sellers', 'url' => ''));
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function add_seller() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_seller')) {
                if ($this->sellers_mod->saveSeller()) {
                    redirect('sellers');
                }
            }
        }
        $data['dir'] = 'sellers';
        $data['page'] = 'seller_form';
        $data['page_title'] = 'Sellers';
        $data['form_action'] = site_url('sellers/add_seller/');
        $data['nav_path'] = array(0 => array('title' => 'Sellers', 'url' => site_url('sellers')), 1 => array('title' => 'Add Seller', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_seller($seller_id = '') {
        if ($seller_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_seller')) {
                if ($this->sellers_mod->updateSeller()) {
                    $this->session->set_flashdata('msg', 'Seller updated successfully!');
                    redirect('sellers');
                }
            }
        }
        $data = $this->sellers_mod->getSellerDetails($seller_id);
        if ($data['seller_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('seller_id', $data['seller_id']);
        $data['form_action'] = site_url('sellers/edit_seller/' . $data['seller_id']);
        $data['dir'] = 'sellers';
        $data['page'] = 'seller_form';
        $data['page_title'] = 'Sellers';
        $data['nav_path'] = array(0 => array('title' => 'Sellers', 'url' => site_url('sellers')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_seller($seller_id = '') {
        if ($seller_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->sellers_mod->deleteSeller($seller_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
