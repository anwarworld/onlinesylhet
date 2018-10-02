<?php

class companies_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getCompanies($limit = false, $start = '', $perpage = '') {
        $con = "where 1";
        $limit_sql = '';
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $query = $this->db->query("select companies.* from companies  $con order by company_name  asc $limit_sql");
        return $query->result_array();
    }

    function saveCompany() {
        $company_name = filter_input(INPUT_POST, 'company_name');
        $company_email = filter_input(INPUT_POST, 'company_email');
        $company_phone = filter_input(INPUT_POST, 'company_phone');
        $company_address = filter_input(INPUT_POST, 'company_address');
        $company_status = filter_input(INPUT_POST, 'company_status');
        if ($_FILES['image']['name'] != '') {
            $company_image = $this->addImage();
        } else {
            $company_image = '';
        }
        $data = array(
            'company_name' => $company_name,
            'company_email' => $company_email,
            'company_phone' => $company_phone,
            'company_address' => $company_address,
            'company_image' => $company_image,
            'company_status' => $company_status
        );
        return $this->db->insert('companies', $data);
    }

    function addImage($pre_image = '') {
        $param['dir'] = FRONT_UPLOAD_PATH . "companies/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(FRONT_UPLOAD_PATH . 'companies/');
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

    function deleteCompany($company_id) {
        $this->db->where('company_id', $company_id);
        return $this->db->delete('companies');
    }

    function getCompanyDetails($company_id = '') {
        $sql = "SELECT * FROM companies WHERE company_id = ?";
        $query = $this->db->query($sql, array($company_id));
        return $query->row_array();
    }

    function updateCompany() {
        $company_id = $this->session->userdata('company_id');
        $company_name = filter_input(INPUT_POST, 'company_name');
        $company_email = filter_input(INPUT_POST, 'company_email');
        $company_phone = filter_input(INPUT_POST, 'company_phone');
        $company_address = filter_input(INPUT_POST, 'company_address');
        $company_status = filter_input(INPUT_POST, 'company_status');
        if ($_FILES['image']['name'] != '') {
            $pre_image = filter_input(INPUT_POST, 'h_image');
            $company_image = $this->addImage($pre_image);
        } else {
            $company_image = filter_input(INPUT_POST, 'h_image');
        }
        $data = array(
            'company_name' => $company_name,
            'company_email' => $company_email,
            'company_phone' => $company_phone,
            'company_address' => $company_address,
            'company_image' => $company_image,
            'company_status' => $company_status
        );
        $this->db->where('company_id', $company_id);
        return $this->db->update('companies', $data);
    }

}
