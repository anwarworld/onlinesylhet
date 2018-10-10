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

    function getDeliveryMethods() {
        $sql = "SELECT * FROM delivery_methods WHERE method_status = ?";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    function getSessionDeliveryMethods() {
        $delivery_method = $this->session->userdata('delivery_method');
        $sql = "SELECT * FROM delivery_methods WHERE method_status = ? AND method_id = ?";
        $query = $this->db->query($sql, array(1, $delivery_method));
        return $query->row_array();
    }

    function getSessionPaymentMethods() {
        $payment_method = $this->session->userdata('payment_method');
        $sql = "SELECT * FROM payment_methods WHERE method_status = ? AND method_id = ?";
        $query = $this->db->query($sql, array(1, $payment_method));
        return $query->row_array();
    }

    function placeOrderDetails() {
        $delivery_method = filter_input(INPUT_POST, 'delivery_method');
        $this->session->set_userdata('delivery_method', $delivery_method);

        $payment_method = filter_input(INPUT_POST, 'payment_method');
        $this->session->set_userdata('payment_method', $payment_method);
        $delivery_address = filter_input(INPUT_POST, 'address');
        $this->session->set_userdata('address', $delivery_address);
    }

}
