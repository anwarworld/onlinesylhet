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
                            <input class="input" type="text" name="full_name" value="<?= $user_full_name ?>"  placeholder="Full Name">
                            <?= form_error('full_name', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email"  value="<?= $user_email ?>" placeholder="Email">
                            <?= form_error('email', '<span class="bg-red-active">', '</span>') ?>
                        </div> 
                        <div class="form-group">
                            <input class="input" type="tel" name="mobile" value="<?= $user_phone ?>" placeholder="Mobile Phone Number">
                            <?= form_error('mobile', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Delevery Address">
                            <?= form_error('address', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <?php if (!Common::isLoggedIn()): ?>
                            <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" name="new_register" value="1" id="register">
                                    <label class="font-weak" for="register">Create Account?</label>
                                    <div class="caption">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                        </p>
                                        <input class="input" type="password" name="password" placeholder="Enter Your Password">
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
                            <input type="radio" name="delivery_method" value="<?= $method['method_id'] ?>" id="shipping-<?= $key ?>">
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
                            <input type="radio" name="payment_method" value="<?= $method['method_id'] ?>" id="payments-<?= $method['method_id'] ?>" />
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
                                    foreach ($carts_info['rows'] as $cart) :
                                        ?>
                                        <tr class="product-details-<?= $cart['product_id'] ?>">
                                            <td  class="thumb"><img src="uploads/products/thumb<?= $cart['product_image'] ?>" alt="<?= $cart['product_name'] ?>"></td>
                                            <td class="details">
                                                <a href="<?= site_url('products/details/' . $cart['product_id'] . '/' . Common::encodeMyURL($cart['product_name'])) ?>"><?= $cart['product_name'] ?></a>
                                            </td>
                                            <td class="price text-center"><strong>&#2547; <?= $cart['product_price'] ?></strong>
                                                <?php if ($cart['product_regular_price'] > $cart['product_price']): ?>
                                                    <br><del class="font-weak"><small>&#2547; <?= $cart['product_regular_price'] ?></small></del>
                                                <?php endif; ?>
                                            </td>
                                            <td class="qty text-center"><input class="input quantity-value-change" type="number" rel="<?= $cart['quantity'] ?>" title="<?= $cart['product_id'] ?>" value="<?= $cart['quantity'] ?>"></td>
                                            <td class="total text-center product-total-<?= $cart['product_id'] ?>"><strong class="primary-color">&#2547; <?= $cart['product_price'] * $cart['quantity'] ?></strong></td>
                                            <td class="text-right"><button class="main-btn icon-btn remove-from-cart" value="<?= $cart['product_id'] ?>" title="<?= $cart['product_name'] ?>"><i class="fa fa-close"></i></button></td>
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