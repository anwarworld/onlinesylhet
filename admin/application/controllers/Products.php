<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('products_mod');
    }

    public function index() {
        $data['dir'] = 'products';
        $data['page'] = 'index';
        $data['page_title'] = 'Products';
        $data['nav_path'] = array(0 => array('title' => 'Products', 'url' => ''));
        $data['msg'] = $this->session->flashdata('msg');
        $data['rows'] = $this->products_mod->getProducts(false);
        $this->load->view('main', $data);
    }

    public function add_product() {
//        $this->output->cache(60);
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_product')) {
                if ($this->products_mod->saveProduct()) {
                    $this->session->set_flashdata('msg', 'Product added successfully!');
                    redirect('products');
                }
            }
        }
        $data['dir'] = 'products';
        $data['page'] = 'product_form';
        $data['page_title'] = 'Products';
        $data['form_action'] = site_url('products/add_product');
        $data['parent_cateories'] = $this->products_mod->getCategories(0);
        $data['brands'] = $this->products_mod->getBrands();
        $data['sellers'] = $this->products_mod->getSellers();
        $data['nav_path'] = array(0 => array('title' => 'Products', 'url' => site_url('products')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_product($product_id = '') {
        if ($product_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_product')) {
                if ($this->products_mod->updateProduct()) {
                    $this->session->set_flashdata('msg', 'Product updated successfully!');
                    redirect('products');
                }
            }
        }
        $data = $this->products_mod->getProductDetails($product_id);
        if ($data['product_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('product_id', $data['product_id']);
        $data['form_action'] = site_url('products/edit_product/' . $data['product_id']);
        $data['dir'] = 'products';
        $data['page'] = 'product_form';
        $data['page_title'] = 'Products';
        $data['parent_cateories'] = $this->products_mod->getCategories(0);
        $data['brands'] = $this->products_mod->getBrands();
        $data['sellers'] = $this->products_mod->getSellers();
        $data['nav_path'] = array(0 => array('title' => 'Products', 'url' => site_url('products')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_product($product_id = '') {
        if ($product_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->products_mod->deleteProduct($product_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
