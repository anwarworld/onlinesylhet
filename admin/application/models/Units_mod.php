<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
 */
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

    function saveUnit() {
        $unit_name = filter_input(INPUT_POST, 'unit_name');
        $data = array(
            'unit_name' => $unit_name
        );
        return $this->db->insert('units', $data);
    }

    function deleteUnit($unit_id) {
        $this->db->where('unit_id', $unit_id);
        return $this->db->delete('units');
    }

    function getUnitDetails($unit_id = '') {
        $sql = "SELECT * FROM units WHERE unit_id = ?";
        $query = $this->db->query($sql, array($unit_id));
        return $query->row_array();
    }

    function updateUnit() {
        $unit_id = $this->session->userdata('unit_id');
        $unit_name = filter_input(INPUT_POST, 'unit_name');
        $unit_status = filter_input(INPUT_POST, 'unit_status');

        $data = array(
            'unit_name' => $unit_name,
            'unit_status' => $unit_status
        );
        $this->db->where('unit_id', $unit_id);
        return $this->db->update('units', $data);
    }

}
