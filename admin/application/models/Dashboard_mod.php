<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard_mod
 *
 * @author user
 */
class Dashboard_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getNewUsers() {
        $con = "where 1 and user_name<>'admin' ";
        $query = $this->db->query("select users.* from users  $con order by user_reg_date desc limit 0,10");
        return $query->result_array();
    }

    function getNewOrders() {
        $query = $this->db->query("select orders.* from orders  where 1 order by order_date desc limit 0,10");
        return $query->result_array();
    }

}
