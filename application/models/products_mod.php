<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of products_mod
 *
 * @author user
 */
class products_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getTotalProduct() {
        $sql = "SELECT count(product_id) as totalRows FROM products WHERE product_status = ?";
        $query = $this->db->query($sql, array(1));
        $data = $query->row_array();
        return $data['totalRows'];
    }

    function getAllProducts($limit, $start, $perPage) {
        $limit_sql = '';
        if ($limit) {
            $limit_sql = ' limit ' . $start . ',' . $perPage;
        }
        $sql = "SELECT product_id,product_name,product_image,product_price,product_price_unit,product_discount,product_regular_price,product_total_rating,product_number_rating FROM products WHERE product_status = ? $limit_sql";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    function getProductDetails($product_id = '') {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $query = $this->db->query($sql, array($product_id));
        return $query->row_array();
    }

    function getCategoryProducts($category_id, $start, $perPage) {
        $sql = "SELECT product_id,product_name,product_image,product_price,product_price_unit,product_discount,product_regular_price,product_total_rating,product_number_rating FROM products WHERE product_status = ? AND category_id=? limit " . $start . ',' . $perPage;
        $query = $this->db->query($sql, array(1, $category_id));
        return $query->result_array();
    }

    function getTotalProductsByCategory($category_id) {
        $sql = "SELECT count(product_id) as totalRows FROM products WHERE product_status = ? AND category_id=?";
        $query = $this->db->query($sql, array(1, $category_id));
        $data = $query->row_array();
        return $data['totalRows'];
    }

    function getTotalProductsBySales() {
        $sql = "SELECT count(product_id) as totalRows FROM products WHERE product_status = 1 AND product_discount > 0";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data['totalRows'];
    }

    function getProductsBySales($start, $perPage) {
        $sql = "SELECT product_id,product_name,product_image,product_price,product_price_unit,product_discount,product_regular_price,product_total_rating,product_number_rating FROM products WHERE product_status = 1 AND product_discount > 0 limit " . $start . ',' . $perPage;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function saveReview($data) {
        if ($data['review_rating'] > 0) {
            $sql = "UPDATE products set product_total_rating=product_total_rating+" . $data['review_rating'] . ', product_number_rating=product_number_rating+1 WHERE product_id=' . $data['product_id'];
            $this->db->query($sql);
        }
        return $this->db->insert('product_reviews', $data);
    }

    function getProductReview($product_id, $start, $limit) {
        $limit_sql = ' limit ' . $start . ',' . $limit;
        $sql = "SELECT * FROM product_reviews WHERE product_id = ? order by review_date desc $limit_sql";
        $query = $this->db->query($sql, array($product_id));
        return $query->result_array();
    }

}
