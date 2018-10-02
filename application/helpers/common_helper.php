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

    public static function getParentCategories() {
        $CI = & get_instance();
        $sql = "SELECT * FROM categories WHERE category_status = ? and parent_cat_id=?";
        $query = $CI->db->query($sql, array(1, 0));
        return $query->result_array();
    }

    public static function getCategories() {
        $CI = & get_instance();
        $sql = "SELECT category_id,category_name,parent_cat_id,category_image FROM categories WHERE category_status = ?";
        $query = $CI->db->query($sql, array(1));
        $rows = $query->result_array();
        $data = array();
        foreach ($rows as $row) {
            if ($row['parent_cat_id'] == 0) {
                $data[$row['category_id']] = $row;
            } else {
                $temp = $data[$row['parent_cat_id']];
                $temp['childCategories'][] = $row;
                $data[$row['parent_cat_id']] = $temp;
            }
        }
//        print("<pre>" . print_r($data, true) . "</pre>");
        return $data;
    }

    public static function encodeMyURL($url) {
        $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
        $url = trim($url, "-");
        $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
        $url = strtolower($url);
        $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
        return $url;
    }

    public static function getPages() {
        $data = array(
            array('page_title' => 'About Us', 'page_name' => 'about_us'),
            array('page_title' => 'Delivery & Return', 'page_name' => 'delivery_and_return'),
            array('page_title' => 'Privacy Policy', 'page_name' => 'privacy_policy'),
            array('page_title' => 'Payment Process', 'page_name' => 'payment'),
            array('page_title' => 'FAQ', 'page_name' => 'faq')
        );
        return $data;
    }

    public static function getCartsData() {
        $CI = & get_instance();
        $data['rows'] = $CI->session->userdata('carts_data');
        $data['cart_quantity'] = $CI->session->userdata('cart_quantity');
        $data['cart_total_amount'] = $CI->session->userdata('cart_total_amount');
        return $data;
    }

    public static function getPickedForYou() {
        $CI = & get_instance();
        $sql = "SELECT * FROM products WHERE product_status = ? order by rand() limit 0,4";
        $query = $CI->db->query($sql, array(1));
        return $query->result_array();
    }

    public static function getLatestProducts() {
        $CI = & get_instance();
        $sql = "SELECT * FROM products WHERE product_status = ? order by product_date desc limit 0,4";
        $query = $CI->db->query($sql, array(1));
        return $query->result_array();
    }

    public static function generateUUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,
                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}
