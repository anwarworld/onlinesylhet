<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home_mod
 *
 * @author user
 */
class home_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getSliders() {
        $sql = "SELECT slider_title,slider_slogan,slider_url,slider_image FROM sliders WHERE slider_status = ?";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

}
