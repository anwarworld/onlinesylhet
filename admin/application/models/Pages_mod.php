<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
 */
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

    function saveSettings() {
        $site_title = filter_input(INPUT_POST, 'site_title');
        $site_slogan = filter_input(INPUT_POST, 'site_slogan');
        $meta_keywords = filter_input(INPUT_POST, 'meta_keywords');
        $meta_contents = filter_input(INPUT_POST, 'meta_contents');

        $contact_email = filter_input(INPUT_POST, 'contact_email');
        $contact_phone = filter_input(INPUT_POST, 'contact_phone');
        $contact_address = filter_input(INPUT_POST, 'contact_address');
        $newsletter = filter_input(INPUT_POST, 'newsletter');

        $data = array(
            'setting_value' => $site_title
        );
        $this->db->where('setting_id', 1);
        $this->db->update('settings', $data);

        $data = array(
            'setting_value' => $site_slogan
        );
        $this->db->where('setting_id', 2);
        $this->db->update('settings', $data);

        $data = array(
            'setting_value' => $meta_keywords
        );
        $this->db->where('setting_id', 3);
        $this->db->update('settings', $data);

        $data = array(
            'setting_value' => $meta_contents
        );
        $this->db->where('setting_id', 4);
        $this->db->update('settings', $data);

        $data = array(
            'setting_value' => $contact_email
        );
        $this->db->where('setting_id', 5);
        $this->db->update('settings', $data);

        $data = array(
            'setting_value' => $contact_phone
        );
        $this->db->where('setting_id', 6);
        $this->db->update('settings', $data);

        $data = array(
            'setting_value' => $contact_address
        );
        $this->db->where('setting_id', 7);
        $this->db->update('settings', $data);
        $data = array(
            'setting_value' => $newsletter
        );
        $this->db->where('setting_id', 8);
        return $this->db->update('settings', $data);
    }

    function getSettings() {
        $query = $this->db->query("select * from settings");
        $rows = $query->result_array();

        $data = array();
        foreach ($rows as $row) {
            $data[$row['setting_key']] = $row['setting_value'];
        }

        return $data;
    }

}
