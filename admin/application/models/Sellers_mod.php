<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
 */
class sellers_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getTotalSellers() {
        $sql = "SELECT count(seller_id) as totalRows FROM sellers";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data['totalRows'];
    }

    function getSellers($limit = false, $start = '', $perpage = '') {
        $con = "where 1";
        $limit_sql = '';
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $query = $this->db->query("select sellers.* from sellers  $con order by seller_name  asc $limit_sql");
        return $query->result_array();
    }

    function saveSeller() {
        $seller_name = filter_input(INPUT_POST, 'seller_name');
        $seller_email = filter_input(INPUT_POST, 'seller_email');
        $seller_phone = filter_input(INPUT_POST, 'seller_phone');
        $seller_city = filter_input(INPUT_POST, 'seller_city');
        $seller_address = filter_input(INPUT_POST, 'seller_address');
        $user_id = $this->session->userdata('user_id');
        $seller_status = filter_input(INPUT_POST, 'seller_status');
        if ($_FILES['image']['name'] != '') {
            $seller_image = $this->addImage();
        } else {
            $seller_image = '';
        }
        $data = array(
            'seller_name' => $seller_name,
            'seller_email' => $seller_email,
            'seller_phone' => $seller_phone,
            'seller_city' => $seller_city,
            'seller_address' => $seller_address,
            'seller_image' => $seller_image,
            'seller_status' => $seller_status,
            'user_id' => $user_id
        );
        return $this->db->insert('sellers', $data);
    }

    function addImage($pre_image = '') {
        $param['dir'] = FRONT_UPLOAD_PATH . "sellers/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(FRONT_UPLOAD_PATH . 'sellers/');
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

    function deleteSeller($seller_id) {
        $this->db->where('seller_id', $seller_id);
        return $this->db->delete('sellers');
    }

    function getSellerDetails($seller_id = '') {
        $sql = "SELECT * FROM sellers WHERE seller_id = ?";
        $query = $this->db->query($sql, array($seller_id));
        return $query->row_array();
    }

    function updateSeller() {
        $seller_id = $this->session->userdata('seller_id');
        $seller_name = filter_input(INPUT_POST, 'seller_name');
        $seller_email = filter_input(INPUT_POST, 'seller_email');
        $seller_phone = filter_input(INPUT_POST, 'seller_phone');
        $seller_city = filter_input(INPUT_POST, 'seller_city');
        $seller_address = filter_input(INPUT_POST, 'seller_address');
        $seller_status = filter_input(INPUT_POST, 'seller_status');

        if ($_FILES['image']['name'] != '') {
            $pre_image = filter_input(INPUT_POST, 'h_image');
            $seller_image = $this->addImage($pre_image);
        } else {
            $seller_image = filter_input(INPUT_POST, 'h_image');
        }
        $data = array(
            'seller_name' => $seller_name,
            'seller_email' => $seller_email,
            'seller_phone' => $seller_phone,
            'seller_city' => $seller_city,
            'seller_address' => $seller_address,
            'seller_image' => $seller_image,
            'seller_status' => $seller_status
        );
        $this->db->where('seller_id', $seller_id);
        return $this->db->update('sellers', $data);
    }

}
