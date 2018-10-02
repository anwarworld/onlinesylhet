<?php

class pages_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getPages() {
        $data = array(
            array('page_title' => 'About Us', 'page_name' => 'about_us'),
            array('page_title' => 'Delivery & Return', 'page_name' => 'delivery_and_return'),
            array('page_title' => 'Privacy Policy', 'page_name' => 'privacy_policy'),
            array('page_title' => 'Payment Process', 'page_name' => 'payment'),
            array('page_title' => 'FAQ', 'page_name' => 'faq')
        );
        return $data;
    }

//    function savePage() {
//        $page_name = filter_input(INPUT_POST, 'page_name');
//        $page_des = filter_input(INPUT_POST, 'page_des');
//        write_file(FRONT_END . "views/pages/" . $page_name . ".php", $page_des, "w+");
//    }

    function savePage() {
        $page_name = filter_input(INPUT_POST, 'page_name');
        $page_des = '<div class="container" style="padding:30px;">
        <div class="row">' . filter_input(INPUT_POST, 'page_des') . '</div></div>';
        @unlink(FRONT_END . "views/pages/" . $page_name . '.php');
        return write_file(FRONT_END . "views/pages/" . $page_name . ".php", $page_des, "w+");
    }

}
