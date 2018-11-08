<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
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
        $delivery_address = filter_input(INPUT_POST, 'user_address');
        $this->session->set_userdata('user_address', $delivery_address);

        $data['rows'] = $this->session->userdata('carts_data');

        $data['cart_quantity'] = $this->session->userdata('cart_quantity');
        $data['cart_total_amount'] = $this->session->userdata('cart_total_amount');
    }

    function isValidUser() {
        $user_email = filter_input(INPUT_POST, 'user_email');
        $user_phone = filter_input(INPUT_POST, 'user_phone');
        $sql = "SELECT * FROM users WHERE user_email = ? or user_phone=?";
        $query = $this->db->query($sql, array($user_email, $user_phone));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function saveUser() {
        $user_full_name = filter_input(INPUT_POST, 'user_full_name');
        $user_email = filter_input(INPUT_POST, 'user_email');
        $user_phone = filter_input(INPUT_POST, 'user_phone');
        $user_address = filter_input(INPUT_POST, 'user_address');
        $user_password = filter_input(INPUT_POST, 'user_password');
        $data = array(
            'user_full_name' => $user_full_name,
            'user_email' => $user_email,
            'user_phone' => $user_phone,
            'user_password' => $user_password,
            'user_address' => $user_address,
            'user_status' => 1,
        );
        $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();
        if ($user_id > 0) {
            $data['user_d'] = $user_id;
            Common::do_login($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function confirmOrder() {
        $data = Common::getSessionUserData();
        if ($data['user_id'] == '') {
            return FALSE;
        }
        $data['order_transaction_id'] = uniqid();
        $data['delivery_method'] = $this->session->userdata('delivery_method');
        $data['payment_method'] = $this->session->userdata('payment_method');
        $data['total_quantity'] = $this->session->userdata('cart_quantity');
        $data['total_amount'] = $this->session->userdata('cart_total_amount');
        $data['order_data'] = json_encode($this->session->userdata('carts_data'));

        return $this->db->insert('orders', $data);
    }

    function flashSessionOrder() {
        $this->session->unset_userdata('delivery_method');
        $this->session->unset_userdata('delivery_method');
        $this->session->unset_userdata('cart_quantity');
        $this->session->unset_userdata('cart_total_amount');
        $this->session->unset_userdata('carts_data');
    }

}
