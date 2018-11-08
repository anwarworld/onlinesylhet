<?php

class Common {

    public static function redirect() {
        $CI = & get_instance();
        $uri = $CI->session->userdata('cur_uri');
        redirect($uri);
    }

    public static function track_uri() {
        $CI = & get_instance();
        $uri = $CI->uri->uri_string();
        $CI->session->set_userdata('cur_uri', $uri);
    }

    public static function is_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in')) {
            return true;
        } else {
            return false;
        }
    }

    function is_admin() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_name') == 'admin') {
            return true;
        } else {
            common::redirect();
        }
    }

    function is_admin_logged() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_name') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function is_admin_user() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_name') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function isLogged() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function getSessionUserData() {
        $CI = & get_instance();
        $data = array();
        if ($CI->session->userdata('logged')) {
            $data['user_id'] = $CI->session->userdata('user_id');
            $data['user_name'] = $CI->session->userdata('user_name');
            $data['user_full_name'] = $CI->session->userdata('user_full_name');
        }

        return $data;
    }

    public static function getProductTypes() {
        $data = array(
            1 => 'General Product',
            2 => 'Featured Product',
            3 => 'Deal Of the Day',
            4 => 'Latest Product'
        );
        return $data;
    }

}
