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
    ),
    'valid_signin' => array(
        array('field' => 'mobile_email', 'label' => 'Mobile/Email', 'rules' => 'required'),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required')
    ),
    'valid_signup' => array(
        array('field' => 'full_name', 'label' => 'Full Name', 'rules' => 'required'),
        array('field' => 'email', 'label' => 'Email', 'rules' => 'required|callback_is_valid_user'),
        array('field' => 'mobile', 'label' => 'Mobile', 'rules' => 'required|callback_is_valid_user'),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[password]')
    ),
    'valid_change_password' => array(
        array('field' => 'old_password', 'label' => 'Old Password', 'rules' => 'required|callback_is_valid_old_password'),
        array('field' => 'password', 'label' => 'New Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[password]')
    ),
    'valid_place_order' => array(
        array('field' => 'user_full_name', 'label' => 'Full Name', 'rules' => 'required'),
        array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required'),
        array('field' => 'user_phone', 'label' => 'Mobile', 'rules' => 'required'),
        array('field' => 'user_address', 'label' => 'Address', 'rules' => 'required'),
        array('field' => 'delivery_method', 'label' => 'Delivery Method', 'rules' => 'required'),
        array('field' => 'payment_method', 'label' => 'Payment Method', 'rules' => 'required')
    ),
    'valid_place_order_unregister' => array(
        array('field' => 'user_full_name', 'label' => 'Full Name', 'rules' => 'required'),
        array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required|callback_is_valid_user'),
        array('field' => 'user_phone', 'label' => 'Mobile', 'rules' => 'required|callback_is_valid_user'),
        array('field' => 'user_address', 'label' => 'Address', 'rules' => 'required'),
        array('field' => 'user_password', 'label' => 'Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[user_password]'),
        array('field' => 'delivery_method', 'label' => 'Delivery Method', 'rules' => 'required'),
        array('field' => 'payment_method', 'label' => 'Payment Method', 'rules' => 'required')
    )
);
?>