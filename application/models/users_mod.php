<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users_mod
 *
 * @author user
 */
class users_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function isValidLogin() {
        $user_name = filter_input(INPUT_POST, 'mobile_email');
        $user_password = filter_input(INPUT_POST, 'password');
        $user_status = 1;
        $sql = "SELECT * FROM users WHERE (user_email = ? OR user_phone = ? ) AND user_password = ? AND user_status= ?";
        $query = $this->db->query($sql, array($user_name, $user_name, $user_password, $user_status));
        if ($query->num_rows() > 0) {
            $this->do_login($query->row_array());
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function do_login($data) {
        $this->session->set_userdata('user_id', $data['user_id']);
        $this->session->set_userdata('user_phone', $data['user_phone']);
        $this->session->set_userdata('user_email', $data['user_email']);
        $this->session->set_userdata('user_full_name', $data['user_full_name']);
        $this->session->set_userdata('user_logged_in', TRUE);
    }

    function do_logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_phone');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_full_name');
        $this->session->unset_userdata('user_logged_in');
    }

}
