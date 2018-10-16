<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
 */
class Orders_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getTotalOrders() {
        $sql = "SELECT count(order_id) as totalRows FROM orders";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data['totalRows'];
    }

    function getOrders($limit = false, $start = '', $perpage = '') {
        $con = "where 1";
        $limit_sql = '';
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $query = $this->db->query("select orders.* from orders  $con order by order_date desc $limit_sql");
        return $query->result_array();
    }

}
