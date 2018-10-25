<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('categories_mod');
    }

    public function index() {
        //       Pagination start
        $this->load->library("pagination");
        $start = $this->uri->segment(3);
        if ($start == '') {
            $start = 0;
        }
        $total_rows = $this->categories_mod->getTotalCategories();
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
        $data['rows'] = $this->categories_mod->getCategories(true, $start, $config['per_page']);
//       Pagination End
        $data['dir'] = 'categories';
        $data['page'] = 'index';
        $data['page_title'] = 'Categories';
        $data['nav_path'] = array(0 => array('title' => 'Categories', 'url' => ''));
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function add_category() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_category')) {
                if ($this->categories_mod->saveCategory()) {
                    $this->session->set_flashdata('msg', 'Category added successfully!');
                    redirect('categories');
                }
            }
        }
        $data['dir'] = 'categories';
        $data['page'] = 'category_form';
        $data['page_title'] = 'Categories';
        $data['form_action'] = site_url('categories/add_category');
        $data['parent_cateories'] = $this->categories_mod->getParentCategories();
        $data['sub_cateories'] = $this->categories_mod->getParentCategories();
        $data['nav_path'] = array(0 => array('title' => 'Categories', 'url' => site_url('categories')), 1 => array('title' => 'Add Category', 'url' => ''));
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
        $data['sub_cateories'] = $this->categories_mod->getSubCategories($data['parent_cat_id']);
        $data['nav_path'] = array(0 => array('title' => 'Categories', 'url' => site_url('categories')), 1 => array('title' => 'Edit Category', 'url' => ''));
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

    function loadSubCategory() {

        $parent_cat = filter_input(INPUT_POST, 'category');
        $parent = explode(':', $parent_cat);
        $data['subcategories'] = $this->categories_mod->getSubCategories($parent[0]);
        $data['success'] = true;

        echo json_encode($data);
    }

}
