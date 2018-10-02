<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('companies_mod');
    }

    public function index() {
        $data['dir'] = 'companies';
        $data['page'] = 'index';
        $data['page_title'] = 'Companies';
        $data['nav_path'] = array(0 => array('title' => 'Companies', 'url' => ''));
        $data['rows'] = $this->companies_mod->getCompanies(false);
        $data['msg'] = $this->session->flashdata('msg');

        $this->load->view('main', $data);
    }

    public function add_company() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_company')) {
                if ($this->companies_mod->saveCompany()) {
                    redirect('companies');
                }
            }
        }
        $data['dir'] = 'companies';
        $data['page'] = 'company_form';
        $data['page_title'] = 'Add Company';
        $data['form_action'] = site_url('companies/add_company/');
        $data['nav_path'] = array(0 => array('title' => 'Companies', 'url' => site_url('companies')), 1 => array('title' => 'Add Company', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_company($company_id = '') {
        if ($company_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_company')) {
                if ($this->companies_mod->updateCompany()) {
                    $this->session->set_flashdata('msg', 'Company updated successfully!');
                    redirect('companies');
                }
            }
        }
        $data = $this->companies_mod->getCompanyDetails($company_id);
        if ($data['company_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('company_id', $data['company_id']);
        $data['form_action'] = site_url('companies/edit_company/' . $data['company_id']);
        $data['dir'] = 'companies';
        $data['page'] = 'company_form';
        $data['page_title'] = 'Edit Company';
        $data['nav_path'] = array(0 => array('title' => 'Companies', 'url' => site_url('companies')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_company($company_id = '') {
        if ($company_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->companies_mod->deleteCompany($company_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
