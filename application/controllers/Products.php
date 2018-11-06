<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('products_mod');
    }

    public function index() {
//       Pagination start
        $this->load->library("pagination");
        $start = $this->uri->segment(3);
        if ($start == '') {
            $start = 0;
        }
        $total_rows = $this->products_mod->getTotalProduct();
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('products/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 20;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();
        $data['product_list'] = $this->products_mod->getAllProducts(true, $start, $config['per_page']);
//       Pagination End

        $data['dir'] = 'products';
        $data['page'] = 'index';
        $data['page_title'] = 'Products';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Products', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function details($product_id = '') {
        if ($product_id == '') {
            Common::redirect();
        }
        $data = $this->products_mod->getProductDetails($product_id);
        if ($data['product_id'] == '') {
            Common::redirect();
        }
        $data['dir'] = 'products';
        $data['page'] = 'details';
        $data['page_title'] = 'Products | ' . $data['product_name'];


        $data['quantity'] = 1;
        $data['product_reviews'] = $this->products_mod->getProductReview($data['product_id'], 0, 3);
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Products', 'url' => site_url('products')), array('title' => $data['category_name'], 'url' => site_url('products/category/' . $data['category_id'] . '/' . Common::encodeMyURL($data['category_name']))), array('title' => $data['product_name'], 'url' => ''));
        $this->load->view('main', $data);
    }

    public function category($category_id = '', $category_name = '') {
        if ($category_id == '') {
            Common::redirect();
        }
        $this->load->model('categories_mod');
        $data = $this->categories_mod->getCategoryDetails($category_id);
        if ($data['category_id'] == '') {
            Common::redirect();
        }

        //       Pagination start
        $this->load->library("pagination");
        $start = $this->uri->segment(5);
        if ($start == '') {
            $start = 0;
        }
        $total_rows = $this->products_mod->getTotalProductsByCategory($category_id);
        $config['uri_segment'] = 5;
        $config['base_url'] = site_url('products/category/' . $category_id . '/' . $category_name . '/');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 20;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();
        $data['product_list'] = $this->products_mod->getCategoryProducts($category_id, $start, $config['per_page']);
//       Pagination End
        $data['dir'] = 'products';
        $data['page'] = 'category';
        $data['page_title'] = 'Products &raquo; ' . $data['category_name'];
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Products', 'url' => site_url('products')), array('title' => $data['category_name'], 'url' => ''));
        $this->load->view('main', $data);
    }

    public function search() {
        $data['product_list'] = $this->products_mod->getAllProducts(false, 0, 10);
        $data['dir'] = 'products';
        $data['page'] = 'search';
        $data['page_title'] = 'Search Products';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Products', 'url' => site_url('products')), array('title' => $data['category_name'], 'url' => ''));
        $this->load->view('main', $data);
    }

    public function sales() {
//       Pagination start
        $this->load->library("pagination");
        $start = $this->uri->segment(3);
        if ($start == '') {
            $start = 0;
        }
        $total_rows = $this->products_mod->getTotalProductsBySales();
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('products/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 20;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();
        $data['product_list'] = $this->products_mod->getProductsBySales($start, $config['per_page']);
//       Pagination End

        $data['dir'] = 'products';
        $data['page'] = 'index';
        $data['page_title'] = 'Products';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Products', 'url' => site_url('products')), array('title' => 'Sales', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function addReview() {
        $this->load->library('form_validation');
        if ($this->form_validation->run('valid_review')) {
            $data['product_id'] = filter_input(INPUT_POST, 'product_id');
            $data['review_name'] = filter_input(INPUT_POST, 'review_name');
            $data['review_email'] = filter_input(INPUT_POST, 'review_email');
            $data['review_details'] = filter_input(INPUT_POST, 'review_details');
            $data['review_rating'] = filter_input(INPUT_POST, 'review_rating');
            if ($this->products_mod->saveReview($data)) {
                $data['success'] = 'Thank you. your review is submitted successfully.';
            }
        } else {
            $data['success'] = false;
        }

        echo json_encode($data);
    }

    public function getProducts($start = 0, $limit = 10) {
        $data = $this->products_mod->getAllProducts(true, $start, $limit);
        echo json_encode($data);
    }

    public function offers($start = 0, $limit = 10) {
        $data = $this->products_mod->getProductsBySales($start, $limit);
        echo json_encode($data);
    }

    public function categoryProducts($category_id, $start = 0, $limit = 10) {
        $data = $this->products_mod->getCategoryProducts($category_id, $start, $limit);
        echo json_encode($data);
    }

}
