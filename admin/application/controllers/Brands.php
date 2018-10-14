<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('brands_mod');
    }

    public function index() {
        $data['dir'] = 'brands';
        $data['page'] = 'index';
        $data['page_title'] = 'Brands';
        $data['nav_path'] = array(0 => array('title' => 'Brands', 'url' => ''));
        $data['rows'] = $this->brands_mod->getBrands(false);
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function add_brand() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_brand')) {
                if ($this->brands_mod->saveBrand()) {
                    redirect('brands');
                }
            }
        }
        $data['dir'] = 'brands';
        $data['page'] = 'brand_form';
        $data['page_title'] = 'Brands';
        $data['form_action'] = site_url('brands/add_brand/');
        $data['nav_path'] = array(0 => array('title' => 'Brands', 'url' => site_url('brands')), 1 => array('title' => 'Add Brand', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_brand($brand_id = '') {
        if ($brand_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_brand')) {
                if ($this->brands_mod->updateBrand()) {
                    $this->session->set_flashdata('msg', 'Brand updated successfully!');
                    redirect('brands');
                }
            }
        }
        $data = $this->brands_mod->getBrandDetails($brand_id);
        if ($data['brand_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('brand_id', $data['brand_id']);
        $data['form_action'] = site_url('brands/edit_brand/' . $data['brand_id']);
        $data['dir'] = 'brands';
        $data['page'] = 'brand_form';
        $data['page_title'] = 'Brands';
        $data['nav_path'] = array(0 => array('title' => 'Brands', 'url' => site_url('brands')), 1 => array('title' => 'Edit Brand', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_brand($brand_id = '') {
        if ($brand_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->brands_mod->deleteBrand($brand_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
