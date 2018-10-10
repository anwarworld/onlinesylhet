<?php

$config = array(
    'valid_change_password' => array(
        array('field' => 'old_password', 'label' => 'Old Password', 'rules' => 'required|callback_is_valid_user_password'),
        array('field' => 'new_password', 'label' => 'New Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[new_password]')
    ),
    'valid_login' => array(
        array('field' => 'user_name', 'label' => 'Username', 'rules' => 'required'),
        array('field' => 'user_password', 'label' => 'Password', 'rules' => 'required')
    ),
    'valid_user' => array(
        array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required|callback_is_valid_user'),
        array('field' => 'user_full_name', 'label' => 'Full Name', 'rules' => 'required'),
        array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required'),
        array('field' => 'user_phone', 'label' => 'Phone', 'rules' => 'required'),
        array('field' => 'user_password', 'label' => 'Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[user_password]')
    ),
    'valid_brand' => array(
        array('field' => 'brand_name', 'label' => 'Brand Name', 'rules' => 'required')
    ),
    'valid_unit' => array(
        array('field' => 'unit_name', 'label' => 'Unit Name', 'rules' => 'required')
    ),
    'valid_category' => array(
        array('field' => 'category_name', 'label' => 'Category Name', 'rules' => 'required')
    ),
    'valid_company' => array(
        array('field' => 'company_name', 'label' => 'Company Name', 'rules' => 'required'),
        array('field' => 'company_address', 'label' => 'Address', 'rules' => 'required'),
        array('field' => 'company_email', 'label' => 'Email', 'rules' => 'required'),
        array('field' => 'company_phone', 'label' => 'Phone', 'rules' => 'required')
    ),
    'valid_seller' => array(
        array('field' => 'seller_name', 'label' => 'Seller Name', 'rules' => 'required'),
        array('field' => 'seller_email', 'label' => 'Email', 'rules' => 'required'),
        array('field' => 'seller_phone', 'label' => 'Phone', 'rules' => 'required'),
        array('field' => 'seller_city', 'label' => 'City', 'rules' => 'required'),
        array('field' => 'seller_address', 'label' => 'Address', 'rules' => 'required')
    ),
    'valid_product' => array(
        array('field' => 'category', 'label' => 'Product Category', 'rules' => 'required'),
        array('field' => 'brand', 'label' => 'Brand', 'rules' => 'required'),
        array('field' => 'seller', 'label' => 'Seller', 'rules' => 'required'),
        array('field' => 'product_name', 'label' => 'Product Name', 'rules' => 'required'),
        array('field' => 'product_regular_price', 'label' => 'Product Regular Price', 'rules' => 'required'),
        array('field' => 'product_discount', 'label' => 'Product Discount', 'rules' => 'required'),
        array('field' => 'product_price', 'label' => 'Product Price', 'rules' => 'required'),
        array('field' => 'product_details', 'label' => 'Product Name', 'rules' => 'required')
    ),
    'valid_slider' => array(
        array('field' => 'slider_title', 'label' => 'Slider Title', 'rules' => 'required'),
        array('field' => 'slider_slogan', 'label' => 'Slider Title', 'rules' => ''),
        array('field' => 'slider_url', 'label' => 'Slider URL', 'rules' => ''),
    ),
    'valid_payment_method' => array(
        array('field' => 'method_name', 'label' => 'Method Name', 'rules' => 'required'),
        array('field' => 'method_des', 'label' => 'Method Details', 'rules' => ''),
        array('field' => 'method_status', 'label' => 'Method Status', 'rules' => ''),
    ),
    'valid_delivery_method' => array(
        array('field' => 'method_name', 'label' => 'Method Name', 'rules' => 'required'),
        array('field' => 'method_fee', 'label' => 'Method Name', 'rules' => 'required'),
        array('field' => 'method_min_amount', 'label' => 'Min. Shopping Amunt', 'rules' => 'required'),
        array('field' => 'method_des', 'label' => 'Method Details', 'rules' => ''),
        array('field' => 'method_status', 'label' => 'Method Status', 'rules' => ''),
    ),
    ///
    'valid_sale' => array(
        array('field' => 'customer_name', 'label' => 'Customer Name', 'rules' => 'required|callback_check_customer_due'),
        array('field' => 'product_code[0]', 'label' => 'Product', 'rules' => 'required'),
        array('field' => 'product_name[0]', 'label' => 'Product', 'rules' => 'required'),
        array('field' => 'product_quantity[0]', 'label' => 'Quantity', 'rules' => 'required|callback_check_quantity'),
        array('field' => 'product_price[0]', 'label' => 'Price', 'rules' => 'required|callback_check_price')
    ),
    'valid_sale_deposit' => array(
        array('field' => 'customer_id', 'label' => 'Customer', 'rules' => 'required'),
        array('field' => 'paid_amount', 'label' => 'Deposit', 'rules' => 'required|callback_customer_deposit_check')
    ),
    'valid_invest' => array(
        array('field' => 'invest_date', 'label' => 'Invest Date', 'rules' => 'required'),
        array('field' => 'invest_title', 'label' => 'Title', 'rules' => 'required'),
        array('field' => 'invest_amount', 'label' => 'Amount', 'rules' => 'required|callback_valid_invest_amount')
    ),
    'valid_purchase_deposit' => array(
        array('field' => 'supplier_id', 'label' => 'Supplier', 'rules' => 'required'),
        array('field' => 'paid', 'label' => 'Deposit', 'rules' => 'required|callback_check_valid_amount'),
        array('field' => 'payment_type', 'label' => 'Payment Type', 'rules' => 'required')
    ),
    'valid_staff' => array(
        array('field' => 'staff_name', 'label' => 'Staff Name', 'rules' => 'required|callback_check_staff_name'),
        array('field' => 'staff_full_name', 'label' => 'Full Name', 'rules' => 'required'),
        array('field' => 'staff_joining_date', 'label' => 'Joining Date', 'rules' => 'required'),
        array('field' => 'staff_permanent_address', 'label' => 'Permanent Address', 'rules' => 'required'),
        array('field' => 'staff_present_address', 'label' => 'Present Address', 'rules' => 'required'),
        array('field' => 'staff_current_salary', 'label' => 'Salary', 'rules' => 'required'),
        array('field' => 'staff_phone', 'label' => 'Phone', 'rules' => 'required'),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'callback_check_password')
    ),
    'update_salary' => array(
        array('field' => 'salary', 'label' => 'Salary', 'rules' => 'callback_is_valid_salary'),
        array('field' => 'apply_date', 'label' => 'Apply Date', 'rules' => 'required'),
        array('field' => 'effective_month', 'label' => 'Effective Month', 'rules' => 'required'),
        array('field' => 'effective_year', 'label' => 'Effective Year', 'rules' => 'required')
    ),
    'valid_payment' => array(
        array('field' => 'salary', 'label' => 'Salary', 'rules' => 'required|callback_check_valid_amount'),
        array('field' => 'month', 'label' => 'Period Month', 'rules' => 'required'),
        array('field' => 'year', 'label' => 'Period Year', 'rules' => 'requied'),
    ),
    'valid_expense_type' => array(
        array('field' => 'type_name', 'label' => 'Type Type', 'rules' => 'required|callback_check_type_name')
    ),
    'valid_expense' => array(
        array('field' => 'type_name', 'label' => 'Type Name', 'rules' => 'required'),
        array('field' => 'amount', 'label' => 'Amount', 'rules' => 'required|numeric')
    ),
    'valid_purchase' => array(
        array('field' => 'supplier_name', 'label' => 'Supplier Name', 'rules' => 'required|callback_check_supplier_due'),
        array('field' => 'product_code[0]', 'label' => 'Product', 'rules' => 'required'),
        array('field' => 'product_name[0]', 'label' => 'Product', 'rules' => 'required'),
        array('field' => 'product_quantity[0]', 'label' => 'Quantity', 'rules' => 'required'),
        array('field' => 'product_price[0]', 'label' => 'Price', 'rules' => 'required')
    ),
    'valid_supplier' => array(
        array('field' => 'supplier_name', 'label' => 'Supplier ID', 'rules' => 'required|callback_check_supplier'),
        array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'),
        array('field' => 'phone', 'label' => 'Phone', 'rules' => 'required')
    ),
    'valid_customer' => array(
        array('field' => 'customer_name', 'label' => 'customer Name', 'rules' => 'required|alpha_dash|callback_customer_name_check'),
        array('field' => 'customer_full_name', 'label' => 'Full Name', 'rules' => 'required'),
        array('field' => 'customer_email', 'label' => 'Email', 'rules' => 'valid_email'),
        array('field' => 'customer_mobile', 'label' => 'Mobile Number', 'rules' => 'required'),
        array('field' => 'customer_address', 'label' => 'Address', 'rules' => 'required')
    ),
    'valid_withdraw' => array(
        array('field' => 'withdraw_title', 'label' => 'Title', 'rules' => 'required'),
        array('field' => 'withdraw_date', 'label' => 'Date', 'rules' => 'required'),
        array('field' => 'withdraw_amount', 'label' => 'Amount', 'rules' => 'required|callback_valid_withdraw')
    )
);
?>