<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of carts_mod
 *
 * @author user
 */
class carts_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getPaymentMethods() {
        $sql = "SELECT * FROM payment_methods WHERE method_status = ?";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

}
