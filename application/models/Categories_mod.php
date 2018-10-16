<?php
/**
 * Description of contacts_mod
 *
 * @author anwar
 */
class categories_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getCategoryDetails($category_id = '') {
        $sql = "SELECT * FROM categories WHERE category_id = ?";
        $query = $this->db->query($sql, array($category_id));
        return $query->row_array();
    }

}
