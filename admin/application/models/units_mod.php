<?php

class units_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUnits($limit = false, $start = '', $perpage = '') {
        $con = "where 1";
        $limit_sql = '';
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $query = $this->db->query("select units.* from units  $con order by unit_name  asc $limit_sql");
        return $query->result_array();
    }

    function saveBrand() {
        $unit_name = filter_input(INPUT_POST, 'unit_name');
        $data = array(
            'unit_name' => $unit_name
        );
        return $this->db->insert('units', $data);
    }

}
