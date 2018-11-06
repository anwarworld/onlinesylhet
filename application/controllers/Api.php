<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of api
 *
 * @author user
 */
class api extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function homeData() {
        $this->load->model('home_mod');
        $data['slider'] = $this->home_mod->getSliders();
        $data['latest_producs'] = Common::getProductsByType(4);
        $data['featured_producs'] = Common::getProductsByType(2);
        $data['deal_producs'] = Common::getProductsByType(3);
        echo json_encode($data);
    }

}
