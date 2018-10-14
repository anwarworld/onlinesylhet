<?php

class categories_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getCategories($limit = false, $start = '', $perpage = '') {
        $con = "where 1";
        $limit_sql = '';
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $query = $this->db->query("select categories.* from categories  $con order by category_name  asc $limit_sql");
        return $query->result_array();
    }

    function saveCategory() {
        $parent_cat = filter_input(INPUT_POST, 'parent_cat');
        $parent = explode(':', $parent_cat);
        $category_name = filter_input(INPUT_POST, 'category_name');
        $category_status = filter_input(INPUT_POST, 'category_status');
        if ($_FILES['image']['name'] != '') {
            $category_image = $this->addImage();
        } else {
            $category_image = '';
        }
        $data = array(
            'parent_cat_id' => $parent[0],
            'parent_cat_name' => $parent[1],
            'category_name' => $category_name,
            'category_image' => $category_image,
            'category_status' => $category_status
        );
        return $this->db->insert('categories', $data);
    }

    function getParentCategories() {
        $query = $this->db->query("select category_id,category_name from categories where parent_cat_id=0");
        return $query->result_array();
    }

    function addImage($pre_image = '') {
        $param['dir'] = FRONT_UPLOAD_PATH . "categories/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(FRONT_UPLOAD_PATH . 'categories/');
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

        $this->zthumb->createThumb($img, 'thumb' . $img, $param['dir'], $param['dir'], 300, 300, true);
        return $img;
    }

    function deleteCategory($category_id) {
        $this->db->where('category_id', $category_id);
        return $this->db->delete('categories');
    }

    function getCategoryDetails($category_id = '') {
        $sql = "SELECT * FROM categories WHERE category_id = ?";
        $query = $this->db->query($sql, array($category_id));
        return $query->row_array();
    }

    function updateCategory() {
        $category_id = $this->session->userdata('category_id');
        $parent_cat = filter_input(INPUT_POST, 'parent_cat');
        $parent = explode(':', $parent_cat);
        $category_name = filter_input(INPUT_POST, 'category_name');
        $category_status = filter_input(INPUT_POST, 'category_status');

        if ($_FILES['image']['name'] != '') {
            $pre_image = filter_input(INPUT_POST, 'h_image');
            $category_image = $this->addImage($pre_image);
        } else {
            $category_image = filter_input(INPUT_POST, 'h_image');
        }
        $data = array(
            'parent_cat_id' => $parent[0],
            'parent_cat_name' => $parent[1],
            'category_name' => $category_name,
            'category_image' => $category_image,
            'category_status' => $category_status
        );
        $this->db->where('category_id', $category_id);
        return $this->db->update('categories', $data);
    }

}
