<?php

class products_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getCategories($category_id = '') {
        $sql = "SELECT * FROM categories WHERE category_status = ? AND parent_cat_id!=0";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    function getBrands() {
        $sql = "SELECT * FROM brands WHERE brand_status = ?";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    function getCompanies() {
        $sql = "SELECT * FROM companies WHERE company_status = ?";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    function getSellers() {
        $sql = "SELECT * FROM sellers WHERE seller_status = ?";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    function getProducts($limit = false, $start = '', $perpage = '') {
        $con = "where 1";
        $limit_sql = '';
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $query = $this->db->query("select products.* from products  $con order by product_name  asc $limit_sql");
        return $query->result_array();
    }

    function saveProduct() {
        $categories = filter_input(INPUT_POST, 'category');
        $category = explode(':', $categories);

        $brands = filter_input(INPUT_POST, 'brand');
        $brand = explode(':', $brands);

        $sellers = filter_input(INPUT_POST, 'seller');
        $seller = explode(':', $sellers);

        $product_name = filter_input(INPUT_POST, 'product_name');
        $product_regular_price = filter_input(INPUT_POST, 'product_regular_price');
        $product_discount = filter_input(INPUT_POST, 'product_discount');
        $product_price = filter_input(INPUT_POST, 'product_price');
        $product_price_unit = filter_input(INPUT_POST, 'product_price_unit');
        $product_details = filter_input(INPUT_POST, 'product_details');
        $product_status = filter_input(INPUT_POST, 'product_status');

        if ($_FILES['image']['name'] != '') {
            $product_image = $this->addImage();
        } else {
            $product_image = '';
        }
        $data = array(
            'category_id' => $category[0],
            'category_name' => $category[1],
            'brand_id' => $brand[0],
            'brand_name' => $brand[1],
            'seller_id' => $seller[0],
//            'seller_name' => $seller[1],
            'product_name' => $product_name,
            'product_regular_price' => $product_regular_price,
            'product_discount' => $product_discount,
            'product_price' => $product_price,
            'product_price_unit' => $product_price_unit,
            'product_details' => $product_details,
            'product_image' => $product_image,
            'product_status' => $product_status
        );
        return $this->db->insert('products', $data);
    }

    function addImage($pre_image = '') {
        $param['dir'] = FRONT_UPLOAD_PATH . "products/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(FRONT_UPLOAD_PATH . 'products/');
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

    function deleteProduct($product_id) {
        $this->db->where('product_id', $product_id);
        return $this->db->delete('products');
    }

    function getProductDetails($product_id = '') {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $query = $this->db->query($sql, array($product_id));
        return $query->row_array();
    }

    function updateProduct() {
        $product_id = $this->session->userdata('product_id');
        $categories = filter_input(INPUT_POST, 'category');
        $category = explode(':', $categories);

        $brands = filter_input(INPUT_POST, 'brand');
        $brand = explode(':', $brands);

        $sellers = filter_input(INPUT_POST, 'seller');
        $seller = explode(':', $sellers);

        $product_name = filter_input(INPUT_POST, 'product_name');
        $product_regular_price = filter_input(INPUT_POST, 'product_regular_price');
        $product_discount = filter_input(INPUT_POST, 'product_discount');
        $product_price = filter_input(INPUT_POST, 'product_price');
        $product_price_unit = filter_input(INPUT_POST, 'product_price_unit');
        $product_details = filter_input(INPUT_POST, 'product_details');
        $product_status = filter_input(INPUT_POST, 'product_status');
        if ($_FILES['image']['name'] != '') {
            $pre_image = filter_input(INPUT_POST, 'h_image');
            $product_image = $this->addImage($pre_image);
        } else {
            $product_image = filter_input(INPUT_POST, 'h_image');
        }
        $data = array(
            'category_id' => $category[0],
            'category_name' => $category[1],
            'brand_id' => $brand[0],
            'brand_name' => $brand[1],
            'seller_id' => $seller[0],
//            'seller_name' => $seller[1],
            'product_name' => $product_name,
            'product_regular_price' => $product_regular_price,
            'product_discount' => $product_discount,
            'product_price' => $product_price,
            'product_price_unit' => $product_price_unit,
            'product_details' => $product_details,
            'product_image' => $product_image,
            'product_status' => $product_status
        );
        $this->db->where('product_id', $product_id);
        return $this->db->update('products', $data);
    }

}
