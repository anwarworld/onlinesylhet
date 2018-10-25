<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
 */
class delivery_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getDelivery($start = 0, $perpage = 10) {
        $con = "where 1";
        $limit_sql = " limit $start,$perpage";
        $query = $this->db->query("select * from delivery_methods  $con order by method_name  asc $limit_sql");
        return $query->result_array();
    }

    function saveDelivery() {
        $method_name = filter_input(INPUT_POST, 'method_name');
        $method_fee = filter_input(INPUT_POST, 'method_fee');
        $method_min_amount = filter_input(INPUT_POST, 'method_min_amount');
        $method_des = filter_input(INPUT_POST, 'method_des');
        $method_status = filter_input(INPUT_POST, 'method_status');
        if ($_FILES['image']['name'] != '') {
            $method_image = $this->addImage();
        } else {
            $method_image = '';
        }
        $data = array(
            'method_name' => $method_name,
            'method_fee' => $method_fee,
            'method_min_amount' => $method_min_amount,
            'method_des' => $method_des,
            'method_image' => $method_image,
            'method_status' => $method_status
        );
        return $this->db->insert('delivery_methods', $data);
    }

    function deleteDelivery($method_id) {
        $this->db->where('method_id', $method_id);
        return $this->db->delete('delivery_methods');
    }

    function addImage($pre_image = '') {
        $param['dir'] = FRONT_UPLOAD_PATH . "delivery/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(FRONT_UPLOAD_PATH . 'delivery/');
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

    function getDeliveryDetails($method_id = '') {
        $sql = "SELECT * FROM delivery_methods WHERE method_id = ?";
        $query = $this->db->query($sql, array($method_id));
        return $query->row_array();
    }

    function updateDelivery() {
        $method_id = $this->session->userdata('method_id');
        $method_name = filter_input(INPUT_POST, 'method_name');
        $method_fee = filter_input(INPUT_POST, 'method_fee');
        $method_min_amount = filter_input(INPUT_POST, 'method_min_amount');
        $method_des = filter_input(INPUT_POST, 'method_des');
        $method_status = filter_input(INPUT_POST, 'method_status');

        if ($_FILES['image']['name'] != '') {
            $pre_image = filter_input(INPUT_POST, 'h_image');
            $method_image = $this->addImage($pre_image);
        } else {
            $method_image = filter_input(INPUT_POST, 'h_image');
        }
        $data = array(
            'method_name' => $method_name,
            'method_fee' => $method_fee,
            'method_min_amount' => $method_min_amount,
            'method_des' => $method_des,
            'method_image' => $method_image,
            'method_status' => $method_status
        );
        $this->db->where('method_id', $method_id);
        return $this->db->update('delivery_methods', $data);
    }

    function getDeliveryMan($start = 0, $perpage = 10) {
        $limit_sql = " limit $start,$perpage";
        $query = $this->db->query("select * from delivery_man  where 1 order by man_fullname  asc $limit_sql");
        return $query->result_array();
    }

    function saveDeliveryMan() {
        $man_fullname = filter_input(INPUT_POST, 'man_fullname');
        $man_phone = filter_input(INPUT_POST, 'man_phone');
        $man_address = filter_input(INPUT_POST, 'man_address');
        $man_status = filter_input(INPUT_POST, 'man_status');
        if ($_FILES['image']['name'] != '') {
            $man_image = $this->addManImage();
        } else {
            $man_image = '';
        }
        $data = array(
            'man_fullname' => $man_fullname,
            'man_phone' => $man_phone,
            'man_address' => $man_address,
            'man_image' => $man_image,
            'man_status' => $man_status
        );
        return $this->db->insert('delivery_man', $data);
    }

    function deleteDeliveryMan($man_id) {
        $this->db->where('man_id', $man_id);
        return $this->db->delete('delivery_man');
    }

    function addManImage($pre_image = '') {
        $param['dir'] = FRONT_UPLOAD_PATH . "delivery/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(FRONT_UPLOAD_PATH . 'delivery/');
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

    function getDeliveryManDetails($man_id = '') {
        $sql = "SELECT * FROM delivery_man WHERE man_id = ?";
        $query = $this->db->query($sql, array($man_id));
        return $query->row_array();
    }

    function updateDeliveryMan() {
        $man_id = $this->session->userdata('man_id');
        $man_fullname = filter_input(INPUT_POST, 'man_fullname');
        $man_phone = filter_input(INPUT_POST, 'man_phone');
        $man_address = filter_input(INPUT_POST, 'man_address');
        $man_status = filter_input(INPUT_POST, 'man_status');

        if ($_FILES['image']['name'] != '') {
            $pre_image = filter_input(INPUT_POST, 'h_image');
            $man_image = $this->addManImage($pre_image);
        } else {
            $man_image = filter_input(INPUT_POST, 'h_image');
        }
        $data = array(
            'man_fullname' => $man_fullname,
            'man_phone' => $man_phone,
            'man_address' => $man_address,
            'man_image' => $man_image,
            'man_status' => $man_status
        );
        $this->db->where('man_id', $man_id);
        return $this->db->update('delivery_man', $data);
    }

}
