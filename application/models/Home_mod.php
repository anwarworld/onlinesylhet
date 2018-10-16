<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
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
