<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <form id="checkout-form" action="<?= site_url('carts/checkout') ?>" method="post" class="clearfix">
                <div class="col-md-6">
                    <div class="billing-details">
                        <?php if (!Common::isLoggedIn()): ?>
                            <p>Already a customer ? <a href="<?= site_url('login') ?>">Login</a></p>
                        <?php endif; ?>
                        <div class="section-title">
                            <h3 class="title">Billing Details</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="user_full_name" value="<?= $user_full_name ?>"  placeholder="Full Name">
                            <?= form_error('user_full_name', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="user_email"  value="<?= $user_email ?>" placeholder="Email">
                            <?= form_error('user_email', '<span class="bg-red-active">', '</span>') ?>
                        </div> 
                        <div class="form-group">
                            <input class="input" type="tel" name="user_phone" value="<?= $user_phone ?>" placeholder="Mobile Phone Number">
                            <?= form_error('user_phone', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="user_address" value="<?= $user_address ?>" placeholder="Delevery Address">
                            <?= form_error('user_address', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <?php if (!Common::isLoggedIn()): ?>
                            <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" name="new_register" <?= $new_register == 1 ? 'checked="checked"' : '' ?> value="1" id="register">
                                    <label class="font-weak" for="register">Create Account?</label>
                                    <div class="caption">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                        </p>
                                        <div class="form-group">
                                            <input class="input"  type="password" name="user_password" placeholder="Enter Your Password" />
                                            <?= form_error('user_password', '<span class="bg-red-active">', '</span>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input class="input"  type="password" name="confirm_password" placeholder="Enter Confirm Password" />
                                            <?= form_error('confirm_password', '<span class="bg-red-active">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shiping-methods">
                        <div class="section-title">
                            <h4 class="title">Delivery Methods</h4>
                        </div>
                        <?php foreach ($delivery_methods as $key => $method):
                            ?>
                            <!--<div class="input-checkbox">-->
                            <input type="radio" name="delivery_method" <?= $delivery_method == $method['method_id'] ? 'checked="checked"' : '' ?> value="<?= $method['method_id'] ?>" id="shipping-<?= $key ?>">
                            <label for="shipping-<?= $key ?>"><?= $method['method_name'] . ' - &#2547;' . $method['method_fee'] ?></label>
                            <div class="caption">
                                <p><?= $method['method_des'] ?></p>
                            </div>
                            <!--</div>-->
                        <?php endforeach; ?>
                        <?= form_error('delivery_method', '<span class="bg-red-active">', '</span>') ?>
                    </div>

                    <div class="payments-methods">
                        <div class="section-title">
                            <h4 class="title">Payments Methods</h4>
                        </div>
                        <?php foreach ($payment_methods as $key => $method):
                            ?>
                            <!--<div class="input-checkbox">-->
                            <input type="radio" name="payment_method" <?= $payment_method == $method['method_id'] ? 'checked="checked"' : '' ?> value="<?= $method['method_id'] ?>" id="payments-<?= $method['method_id'] ?>" />
                            <label for="payments-<?= $method['method_id'] ?>"><?= $method['method_name'] ?></label>
                            <div class="caption">
                                <p><?= $method['method_des'] ?></p>
                            </div>
                            <!--</div>-->
                        <?php endforeach; ?>
                        <?= form_error('payment_method', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Order Review</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th></th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array($carts_info['rows']) && count($carts_info['rows']) > 0) :
                                    foreach ($carts_info['rows'] as $row) :
                                        ?>
                                        <tr class="product-details-<?= $row['product_id'] ?>">
                                            <td  class="thumb"><img src="uploads/products/thumb<?= $row['product_image'] ?>" alt="<?= $row['product_name'] ?>"></td>
                                            <td class="details">
                                                <a href="<?= site_url('products/details/' . $row['product_id'] . '/' . Common::encodeMyURL($row['product_name'])) ?>"><?= $row['product_name'] ?></a>
                                            </td>
                                            <td class="price text-center"><strong>&#2547; <?= $row['product_price'] ?></strong>
                                                <?php if ($row['product_regular_price'] > $row['product_price']): ?>
                                                    <br><del class="font-weak"><small>&#2547; <?= $row['product_regular_price'] ?></small></del>
                                                <?php endif; ?>
                                            </td>
                                            <td class="qty text-center"><input class="input quantity-value-change" type="number" rel="<?= $row['quantity'] ?>" title="<?= $row['product_id'] ?>" value="<?= $row['quantity'] ?>"></td>
                                            <td class="total text-center product-total-<?= $row['product_id'] ?>"><strong class="primary-color">&#2547; <?= $row['product_price'] * $row['quantity'] ?></strong></td>
                                            <td class="text-right"><button class="main-btn icon-btn remove-from-cart" value="<?= $row['product_id'] ?>" title="<?= $row['product_name'] ?>"><i class="fa fa-close"></i></button></td>
                                        </tr>
                                        <?php
                                    endforeach;
                                else :
                                    echo ' <tr><td colspan="6">Sorry! Your cart is empty.</td></tr>';
                                endif;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>SUBTOTAL</th>
                                    <th colspan="2" class="sub-total">&#2547; <?= $carts_info['cart_total_amount'] ?></th>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>DELIVERY FEE</th>
                                    <td colspan="2">Free Shipping</td>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>TOTAL</th>
                                    <th colspan="2" class="total">&#2547; <?= $carts_info['cart_total_amount'] ?></th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <button class="primary-btn" type="submit" name="save" value="save" >Place Order</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->