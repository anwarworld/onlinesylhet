<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carts
 *
 * @author user
 */
class Carts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('carts_mod');
        $this->load->library('form_validation');
    }

    public function index() {

        $data['dir'] = 'carts';
        $data['page'] = 'index';
        $data['page_title'] = 'Cart';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Products', 'url' => site_url('products')), array('title' => 'View Cart', 'url' => ''));

        $this->load->view('main', $data);
    }

    public function checkout() {

        if (filter_input(INPUT_POST, 'save')) {
            if (Common::isLoggedIn()) {
                if ($this->form_validation->run('valid_place_order')) {
                    $this->carts_mod->placeOrderDetails();
                    print_r($_POST);
                    redirect('carts/placeOrder');
                }
            } else if ($this->form_validation->run('valid_place_order_unregister')) {
                $this->carts_mod->saveUser();
                $this->carts_mod->placeOrderDetails();
                redirect('carts/placeOrder');
            }
            /* @var $data type */
            $data = $_POST;
        } else {
            $data = Common::getSessionUserData();
        }

        $data['payment_methods'] = $this->carts_mod->getPaymentMethods();
        $data['delivery_methods'] = $this->carts_mod->getDeliveryMethods();
        $data['dir'] = 'carts';
        $data['page'] = 'checkout';
        $data['page_title'] = 'Cart';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Products', 'url' => site_url('products')), array('title' => 'Checkout', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function is_valid_user() {
        if ($this->carts_mod->isValidUser()) {
            $this->form_validation->set_message('is_valid_user', 'You have already an account using email/mobile.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function placeOrder() {
        if (!Common::isLoggedIn()) {
            Common::redirect();
        }
        if (filter_input(INPUT_POST, 'save')) {
            if ($this->carts_mod->confirmOrder()) {
                $this->session->set_flashdata('msg', 'Thank you! Your order is successfully submitted. We will come back soon.');
                $this->carts_mod->flashSessionOrder();
                redirect('users/orders');
            } else {
                $this->session->set_flashdata('msg', 'Sorry! Something went to be worng. Please try again.');
                redirect('users/orders');
            }
        }
        $data = Common::getSessionUserData();
        $data['payment_method'] = $this->carts_mod->getSessionPaymentMethods();
        $data['delivery_method'] = $this->carts_mod->getSessionDeliveryMethods();
        $data['dir'] = 'carts';
        $data['page'] = 'place_order';
        $data['page_title'] = 'Cart';
        $data['breadcrumb'] = array(array('title' => 'Home', 'url' => site_url('home')), array('title' => 'Products', 'url' => site_url('products')), array('title' => 'Checkout', 'url' => site_url('carts/checkout')), array('title' => 'Place Order', 'url' => ''));
        $this->load->view('main', $data);
    }

    public function addToCart() {
        $this->load->model('products_mod');
        $data['product_id'] = filter_input(INPUT_POST, 'product_id');
        $data['product_name'] = filter_input(INPUT_POST, 'product_name');
        $data['product_image'] = filter_input(INPUT_POST, 'product_image');
        $data['product_price'] = filter_input(INPUT_POST, 'product_price');
        $data['product_regular_price'] = filter_input(INPUT_POST, 'product_regular_price');
        $postquantity = filter_input(INPUT_POST, 'quantity');
        $carts_data = $this->session->userdata('carts_data');
        if ($data['product_id'] != '' && $carts_data[$data['product_id']] != '') {
            $data = $carts_data[$data['product_id']];
            $data['quantity'] = $data['quantity'] + $postquantity;
        } else {
            $data['quantity'] = $postquantity;
        }
        if ($data['product_id'] != '') {
            $dataString = '<div class="product product-widget product-details-' . $data['product_id'] . '">
                                <div class="product-thumb">
                                    <img src="uploads/products/thumb' . $data['product_image'] . '" alt="' . $data['product_name'] . '">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">&#2547; ' . $data['product_price'] . ' <span class="qty"> X ' . $data['quantity'] . '</span></h3>
                                    <h2 class="product-name"><a href="' . site_url('products/details/' . $data['product_id'] . '/' . Common::encodeMyURL($data['product_name'])) . '">' . $data['product_name'] . '</a></h2>
                                </div>
                                <button class="cancel-btn remove-from-cart" value="' . $data['product_id'] . '"><i class="fa fa-trash"></i></button>
                            </div>';
            $quantity = $this->session->userdata('cart_quantity') + 1;
            $totalAmount = $this->session->userdata('cart_total_amount') + $data['product_price'];
            $this->session->set_userdata('cart_quantity', $quantity);
            $this->session->set_userdata('cart_total_amount', $totalAmount);
        }


        $cartInfo['dataString'] = $dataString;
        $cartInfo['quantity'] = $quantity;
        $cartInfo['totalAmount'] = $totalAmount;

        $carts_data[$data['product_id']] = $data;

        $this->session->set_userdata('carts_data', $carts_data);
        echo json_encode($cartInfo);
    }

    public function removeFromCart() {

        $product_id = filter_input(INPUT_POST, 'product_id');
        $data = array();
        $carts_data = $this->session->userdata('carts_data');
        if ($product_id != '') {
            $data = $carts_data[$product_id];
        }
        if ($data['product_id'] != '') {
            $quantity = $this->session->userdata('cart_quantity') - $data['quantity'];
            $totalAmount = $this->session->userdata('cart_total_amount') - $data['quantity'] * $data['product_price'];
            $this->session->set_userdata('cart_quantity', $quantity);
            $this->session->set_userdata('cart_total_amount', $totalAmount);
        }

        $cartInfo['quantity'] = $quantity;
        $cartInfo['totalAmount'] = $totalAmount;
        $cartInfo['product_id'] = $product_id;
        unset($carts_data[$product_id]);
        $this->session->unset_userdata('carts_data');
        $this->session->set_userdata('carts_data', $carts_data);
        echo json_encode($cartInfo);
    }

    public function quantityChange() {

        $product_id = filter_input(INPUT_POST, 'product_id');
        $postquantity = filter_input(INPUT_POST, 'quantity');
        $prev_quantity = filter_input(INPUT_POST, 'prev_quantity');

        $qty = $postquantity - $prev_quantity;

        $data = array();
        $carts_data = $this->session->userdata('carts_data');
        if ($product_id != '') {
            $data = $carts_data[$product_id];
        }
        if ($data['product_id'] != '') {
            $quantity = $this->session->userdata('cart_quantity') + $qty;
            $totalAmount = $this->session->userdata('cart_total_amount') + $qty * $data['product_price'];
            $this->session->set_userdata('cart_quantity', $quantity);
            $this->session->set_userdata('cart_total_amount', $totalAmount);
            $data['quantity'] = $postquantity;
            $cartInfo['productTotal'] = $postquantity * $data['product_price'];
            $carts_data[$product_id] = $data;
        }


        $cartInfo['quantity'] = $quantity;
        $cartInfo['totalAmount'] = $totalAmount;
        $cartInfo['product_id'] = $product_id;
        $this->session->unset_userdata('carts_data');
        $this->session->set_userdata('carts_data', $carts_data);
        echo json_encode($cartInfo);
    }

}
