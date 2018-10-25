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

    function getOrderDetails($order_id = '') {
        $sql = "SELECT * FROM orders WHERE order_id = ?";
        $query = $this->db->query($sql, array($order_id));
        return $query->row_array();
    }

    function getDeliveryStatus($status = -1) {

        $data = array(
            0 => 'Order Posted',
            1 => 'Order Received',
            2 => 'Now Packaging',
            3 => 'Packaging Completed',
            4 => 'Delivery Man Assigned',
            5 => 'Delivering...now',
            6 => 'Delivery Completed'
        );

        if ($status >= 0 && $status < 7) {
            return $data[$status];
        }
        return $data;
    }

    function getDeliveryMan() {
        $query = $this->db->query("select man_id,man_fullname,man_phone from delivery_man where man_status=1");
        return $query->result_array();
    }

    function updateDeliveryOption() {

        $delivery_man = filter_input(INPUT_POST, 'delivery_man');
        $delivery = explode(':', $delivery_man);

        $order_id = filter_input(INPUT_POST, 'order_id');
        $delivery_status = filter_input(INPUT_POST, 'delivery_status');

        $data = array(
            'man_id' => $delivery[0],
            'man_fullname' => $delivery[1],
            'man_phone' => $delivery[2],
            'delivery_status' => $delivery_status
        );
        $this->db->where('order_id', $order_id);
        return $this->db->update('orders', $data);
    }

}
