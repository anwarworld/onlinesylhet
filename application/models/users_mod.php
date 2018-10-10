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

}
