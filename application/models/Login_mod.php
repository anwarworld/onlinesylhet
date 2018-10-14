<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_mod
 *
 * @author user
 */
class login_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function isValidLogin() {
        $mobile_email = filter_input(INPUT_POST, 'mobile_email');
        $user_password = filter_input(INPUT_POST, 'password');
        $user_status = 1;
        $sql = "SELECT * FROM users WHERE (user_email = ? OR user_phone = ? ) AND user_password = ? AND user_status= ?";
        $query = $this->db->query($sql, array($mobile_email, $mobile_email, $user_password, $user_status));
        if ($query->num_rows() > 0) {
            Common::do_login($query->row_array());
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function isValidUser() {
        $user_email = filter_input(INPUT_POST, 'email');
        $user_phone = filter_input(INPUT_POST, 'mobile');
        $sql = "SELECT * FROM users WHERE user_email = ? or user_phone=?";
        $query = $this->db->query($sql, array($user_email, $user_phone));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function saveUser() {
        $user_full_name = filter_input(INPUT_POST, 'full_name');
        $user_email = filter_input(INPUT_POST, 'email');
        $user_phone = filter_input(INPUT_POST, 'mobile');
        $user_password = filter_input(INPUT_POST, 'password');
        $data = array(
            'user_full_name' => $user_full_name,
            'user_email' => $user_email,
            'user_phone' => $user_phone,
            'user_password' => $user_password,
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

    function do_logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_phone');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_full_name');
        $this->session->unset_userdata('user_logged_in');
    }

}
