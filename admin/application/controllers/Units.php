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
                if ($this->units_mod->saveUnit()) {
                    redirect('units');
                }
            }
        }
        $data['dir'] = 'units';
        $data['page'] = 'unit_form';
        $data['page_title'] = 'Units';
        $data['nav_path'] = array(0 => array('title' => 'Units', 'url' => site_url('units')), 1 => array('title' => 'Add Unit', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_unit($unit_id = '') {
        if ($unit_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_unit')) {
                if ($this->units_mod->updateUnit()) {
                    $this->session->set_flashdata('msg', 'Unit updated successfully!');
                    redirect('units');
                }
            }
        }
        $data = $this->units_mod->getUnitDetails($unit_id);
        if ($data['unit_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('unit_id', $data['unit_id']);
        $data['form_action'] = site_url('units/edit_unit/' . $data['unit_id']);
        $data['dir'] = 'units';
        $data['page'] = 'unit_form';
        $data['page_title'] = 'Units';
        $data['nav_path'] = array(0 => array('title' => 'Units', 'url' => site_url('units')), 1 => array('title' => 'Edit Unit', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_unit($unit_id = '') {
        if ($unit_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->units_mod->deleteUnit($unit_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
