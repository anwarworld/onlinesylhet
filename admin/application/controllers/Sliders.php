<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Slider
 *
 * @author user
 */
class Sliders extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!Common::isLogged()) {
            redirect('login');
        }
        $this->load->model('sliders_mod');
    }

    public function index() {
        $data['dir'] = 'sliders';
        $data['page'] = 'index';
        $data['page_title'] = 'Sliders';
        $data['nav_path'] = array(0 => array('title' => 'Sliders', 'url' => ''));
        $data['rows'] = $this->sliders_mod->getSliders(false);
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('main', $data);
    }

    public function add_slider() {
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_slider')) {
                if ($this->sliders_mod->saveSlider()) {
                    $this->session->set_flashdata('msg', 'Slider added successfully!');
                    redirect('sliders');
                }
            }
        }
        $data['dir'] = 'sliders';
        $data['page'] = 'slider_form';
        $data['page_title'] = 'Sliders';
        $data['form_action'] = site_url('sliders/add_slider/');
        $data['nav_path'] = array(0 => array('title' => 'Sliders', 'url' => site_url('sliders')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function edit_slider($slider_id = '') {
        if ($slider_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->form_validation->run('valid_slider')) {
                if ($this->sliders_mod->updateSlider()) {
                    $this->session->set_flashdata('msg', 'Slider updated successfully!');
                    redirect('sliders');
                }
            }
        }
        $data = $this->sliders_mod->getSliderDetails($slider_id);
        if ($data['slider_id'] == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        $this->session->set_userdata('slider_id', $data['slider_id']);
        $data['form_action'] = site_url('sliders/edit_slider/' . $data['slider_id']);
        $data['dir'] = 'sliders';
        $data['page'] = 'slider_form';
        $data['page_title'] = 'Sliders';
        $data['nav_path'] = array(0 => array('title' => 'Sliders', 'url' => site_url('sliders')), 1 => array('title' => 'Add User', 'url' => ''));
        $this->load->view('main', $data);
    }

    function delete_slider($slider_id = '') {
        if ($slider_id == '') {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
            common::redirect();
        }
        if ($this->sliders_mod->deleteSlider($slider_id)) {
            $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        } else {
            $this->session->set_flashdata('msg', 'Something goes to be worng. Please try again!');
        }
        common::redirect();
    }

}
