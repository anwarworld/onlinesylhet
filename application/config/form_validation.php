<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of form_validation
 *
 * @author anwar
 */
$config = array(
    'valid_contact' => array(
        array('field' => 'contact_name', 'label' => 'Name', 'rules' => 'required'),
        array('field' => 'contact_email', 'label' => 'Email', 'rules' => 'required'),
        array('field' => 'contact_phone', 'label' => 'Phone', 'rules' => 'required'),
        array('field' => 'contact_comment', 'label' => 'Comment', 'rules' => 'required')
    ),
    'valid_review' => array(
        array('field' => 'product_id', 'label' => 'Product', 'rules' => 'required'),
        array('field' => 'review_name', 'label' => 'Name', 'rules' => 'required'),
        array('field' => 'review_email', 'label' => 'Email', 'rules' => 'required'),
        array('field' => 'review_details', 'label' => 'Review', 'rules' => 'required'),
        array('field' => 'review_rating', 'label' => 'Rating', 'rules' => 'required')
    )
);
?>