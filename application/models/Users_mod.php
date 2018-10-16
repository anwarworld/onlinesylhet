<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
 */
class users_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function isValidOldPassword() {
        $user_id = $this->session->userdata('user_id');
        $user_password = filter_input(INPUT_POST, 'old_password');
        $sql = "SELECT user_id FROM users WHERE user_id = ? AND user_password = ?";
        $query = $this->db->query($sql, array($user_id, $user_password));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function changePassword() {
        $user_id = $this->session->userdata('user_id');
        $user_password = filter_input(INPUT_POST, 'password');
        $data = array(
            'user_password' => $user_password
        );
        $this->db->where('user_id', $user_id);
        return $this->db->update('users', $data);
    }

    function getAllOrders($start, $perPage) {
        $limit_sql = ' limit ' . $start . ',' . $perPage;
        $user_id = $this->session->userdata('user_id');
        $sql = "SELECT order_id,user_full_name,user_address,user_phone,order_date,total_quantity,total_amount,order_date,delivery_status,delivery_user_name FROM orders WHERE user_id = ? $limit_sql";
        $query = $this->db->query($sql, array($user_id));
        return $query->result_array();
    }

    function getOrderDetails($order_id = '') {
        $sql = "SELECT * FROM orders WHERE order_id = ?";
        $query = $this->db->query($sql, array($order_id));
        return $query->row_array();
    }

}
