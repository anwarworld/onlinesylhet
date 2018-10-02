<?php

class users_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUsers($limit = false, $start = '', $perpage = '') {
        $con = "where 1 and user_name<>'admin' ";
        $limit_sql = '';
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $query = $this->db->query("select users.* from users  $con order by user_name  asc $limit_sql");
        return $query->result_array();
    }

    function saveUser() {
        $user_name = filter_input(INPUT_POST, 'user_name');
        $user_full_name = filter_input(INPUT_POST, 'user_full_name');
        $user_email = filter_input(INPUT_POST, 'user_email');
        $user_phone = filter_input(INPUT_POST, 'user_phone');
        $user_password = filter_input(INPUT_POST, 'user_password');
        $user_status = filter_input(INPUT_POST, 'user_status');
        if ($_FILES['image']['name'] != '') {
            $user_image = $this->addImage();
        } else {
            $user_image = '';
        }
        $data = array(
            'user_name' => $user_name,
            'user_full_name' => $user_full_name,
            'user_email' => $user_email,
            'user_phone' => $user_phone,
            'user_password' => $user_password,
             'user_image' => $user_image,
            'user_status' => $user_status,
        );
        return $this->db->insert('users', $data);
    }

    function isValidUser() {
        $user_name = filter_input(INPUT_POST, 'user_name');
        $sql = "SELECT * FROM users WHERE user_name = ?";
        $query = $this->db->query($sql, array($user_name));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function isValidLogin() {
        $user_name = filter_input(INPUT_POST, 'user_name');
        $user_password = filter_input(INPUT_POST, 'user_password');
        $user_status = 1;
        $sql = "SELECT * FROM users WHERE user_name = ? AND user_password = ? AND user_status= ?";
        $query = $this->db->query($sql, array($user_name, $user_password, $user_status));
        if ($query->num_rows() > 0) {
            $this->do_login($query->row_array());
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function do_login($data) {
        $this->session->set_userdata('user_id', $data['user_id']);
        $this->session->set_userdata('user_name', $data['user_name']);
        $this->session->set_userdata('user_full_name', $data['user_full_name']);
        $this->session->set_userdata('logged', TRUE);
    }

    function do_logout() {
        $this->session->sess_destroy();
    }

    function addImage($pre_image = '') {
        $param['dir'] = FRONT_UPLOAD_PATH . "users/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(FRONT_UPLOAD_PATH . 'users/');
        } else {
            $this->load->library('zupload', $param);
        }

        if ($pre_image != "") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile("thumb" . $pre_image);
        }
        $this->zupload->setFileInputName('image');
        $this->zupload->upload(true);

        $img = $this->zupload->getOutputFileName();
        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }

        $this->zthumb->createThumb($img, 'thumb' . $img, $param['dir'], $param['dir'], 270, 230, true);
        return $img;
    }

    function deleteUser($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('users');
    }

    function getUserDetails($user_id = '') {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $query = $this->db->query($sql, array($user_id));
        return $query->row_array();
    }

    function updateUser() {
        $user_id = $this->session->userdata('user_id');
        $user_name = filter_input(INPUT_POST, 'user_name');
        $user_email = filter_input(INPUT_POST, 'user_email');
        $user_phone = filter_input(INPUT_POST, 'user_phone');
        $user_city = filter_input(INPUT_POST, 'user_city');
        $user_address = filter_input(INPUT_POST, 'user_address');
        $user_status = filter_input(INPUT_POST, 'user_status');

        if ($_FILES['image']['name'] != '') {
            $pre_image = filter_input(INPUT_POST, 'h_image');
            $user_image = $this->addImage($pre_image);
        } else {
            $user_image = filter_input(INPUT_POST, 'h_image');
        }
        $data = array(
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_phone' => $user_phone,
            'user_city' => $user_city,
            'user_address' => $user_address,
            'user_image' => $user_image,
            'user_status' => $user_status
        );
        $this->db->where('user_id', $user_id);
        return $this->db->update('users', $data);
    }

}
