<?php

/**
 * Description of contacts_mod
 *
 * @author anwar
 */
class contacts_mod extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function saveContact() {
        $contact_name = filter_input(INPUT_POST, 'contact_name');
        $contact_email = filter_input(INPUT_POST, 'contact_email');
        $contact_phone = filter_input(INPUT_POST, 'contact_phone');
        $contact_comment = filter_input(INPUT_POST, 'contact_comment');

        $data = array(
            'contact_name' => $contact_name,
            'contact_email' => $contact_email,
            'contact_phone' => $contact_phone,
            'contact_comment' => $contact_comment
        );
        return $this->db->insert('contacts', $data);
    }

}
