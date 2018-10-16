<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
 */
class sliders_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getSliders($limit = false, $start = '', $perpage = '') {
        $con = "where 1";
        $limit_sql = '';
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $query = $this->db->query("select sliders.* from sliders  $con order by slider_title  asc $limit_sql");
        return $query->result_array();
    }

    function saveSlider() {
        $slider_title = filter_input(INPUT_POST, 'slider_title');
        $slider_slogan = filter_input(INPUT_POST, 'slider_slogan');
        $slider_url = filter_input(INPUT_POST, 'slider_url');
        $slider_status = filter_input(INPUT_POST, 'slider_status');
        if ($_FILES['image']['name'] != '') {
            $slider_image = $this->addImage();
        } else {
            $slider_image = '';
        }
        $data = array(
            'slider_title' => $slider_title,
            'slider_slogan' => $slider_slogan,
            'slider_image' => $slider_image,
            'slider_url' => $slider_url,
            'slider_status' => $slider_status
        );
        return $this->db->insert('sliders', $data);
    }

    function deleteSlider($slider_id) {
        $this->db->where('slider_id', $slider_id);
        return $this->db->delete('sliders');
    }

    function addImage($pre_image = '') {
        $param['dir'] = FRONT_UPLOAD_PATH . "sliders/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(FRONT_UPLOAD_PATH . 'sliders/');
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

    function getSliderDetails($slider_id = '') {
        $sql = "SELECT * FROM sliders WHERE slider_id = ?";
        $query = $this->db->query($sql, array($slider_id));
        return $query->row_array();
    }

    function updateSlider() {
        $slider_id = $this->session->userdata('slider_id');
        $slider_title = filter_input(INPUT_POST, 'slider_title');
        $slider_slogan = filter_input(INPUT_POST, 'slider_slogan');
        $slider_url = filter_input(INPUT_POST, 'slider_url');
        $slider_status = filter_input(INPUT_POST, 'slider_status');

        if ($_FILES['image']['name'] != '') {
            $pre_image = filter_input(INPUT_POST, 'h_image');
            $slider_image = $this->addImage($pre_image);
        } else {
            $slider_image = filter_input(INPUT_POST, 'h_image');
        }
        $data = array(
            'slider_title' => $slider_title,
            'slider_slogan' => $slider_slogan,
            'slider_image' => $slider_image,
            'slider_url' => $slider_url,
            'slider_status' => $slider_status
        );
        $this->db->where('slider_id', $slider_id);
        return $this->db->update('sliders', $data);
    }

}
