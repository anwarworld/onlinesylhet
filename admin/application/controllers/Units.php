<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Units extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('units_mod');
    }

    public function index() {
        $data['dir'] = 'units';
        $data['page'] = 'index';
        $data['page_title'] = 'Units';
        $data['nav_path'] = array(0 => array('title' => 'Units', 'url' => ''));
        $data['rows'] = $this->units_mod->getUnits(false);
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function add_unit() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_unit')) {
                if ($this->units_mod->saveBrand()) {
                    redirect('units');
                }
            }
        }
        $data['dir'] = 'units';
        $data['page'] = 'unit_form';
        $data['page_title'] = 'Units';
        $data['nav_path'] = array(0 => array('title' => 'Units', 'url' => site_url('units')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_category($category_id = '') {
        if ($category_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_category')) {
                if ($this->categories_mod->updateCategory()) {
                    $this->session->set_flashdata('msg', 'Category updated successfully!');
                    redirect('categories');
                }
            }
        }
        $data = $this->categories_mod->getCategoryDetails($category_id);
        if ($data['category_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('category_id', $data['category_id']);
        $data['form_action'] = site_url('categories/edit_category/' . $data['category_id']);
        $data['dir'] = 'categories';
        $data['page'] = 'category_form';
        $data['page_title'] = 'Categories';
        $data['parent_cateories'] = $this->categories_mod->getParentCategories();
        $data['nav_path'] = array(0 => array('title' => 'Categories', 'url' => site_url('categories')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_category($category_id = '') {
        if ($category_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->categories_mod->deleteCategory($category_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
