<?php

class brands_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getBrands($limit = false, $start = '', $perpage = '') {
        $con = "where 1";
        $limit_sql = '';
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $query = $this->db->query("select brands.* from brands  $con order by brand_name  asc $limit_sql");
        return $query->result_array();
    }

    function saveBrand() {
        $brand_name = filter_input(INPUT_POST, 'brand_name');
        $brand_status = filter_input(INPUT_POST, 'brand_status');
        if ($_FILES['image']['name'] != '') {
            $brand_image = $this->addImage();
        } else {
            $brand_image = '';
        }
        $data = array(
            'brand_name' => $brand_name,
            'brand_image' => $brand_image,
            'brand_status' => $brand_status
        );
        return $this->db->insert('brands', $data);
    }

    function deleteBrand($brand_id) {
        $this->db->where('brand_id', $brand_id);
        return $this->db->delete('brands');
    }

    function addImage($pre_image = '') {
        $param['dir'] = FRONT_UPLOAD_PATH . "brands/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(FRONT_UPLOAD_PATH . 'brands/');
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

    function getBrandDetails($brand_id = '') {
        $sql = "SELECT * FROM brands WHERE brand_id = ?";
        $query = $this->db->query($sql, array($brand_id));
        return $query->row_array();
    }

    function updateBrand() {
        $brand_id = $this->session->userdata('brand_id');
        $brand_name = filter_input(INPUT_POST, 'brand_name');
        $brand_status = filter_input(INPUT_POST, 'brand_status');

        if ($_FILES['image']['name'] != '') {
            $pre_image = filter_input(INPUT_POST, 'h_image');
            $brand_image = $this->addImage($pre_image);
        } else {
            $brand_image = filter_input(INPUT_POST, 'h_image');
        }
        $data = array(
            'brand_name' => $brand_name,
            'brand_image' => $brand_image,
            'brand_status' => $brand_status
        );
        $this->db->where('brand_id', $brand_id);
        return $this->db->update('brands', $data);
    }

}
