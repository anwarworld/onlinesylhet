<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <form id="checkout-form" action="<?= site_url('carts/checkout') ?>" method="post" class="clearfix">
                <div class="col-md-6">
                    <div class="billing-details">
                        <p>Already a customer ? <a href="#">Login</a></p>
                        <div class="section-title">
                            <h3 class="title">Billing Details</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="full_name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="phone" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Delevery Address">
                        </div>                       
                        <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" id="register">
                                <label class="font-weak" for="register">Create Account?</label>
                                <div class="caption">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                    </p>
                                        <input class="input" type="password" name="password" placeholder="Enter Your Password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shiping-methods">
                        <div class="section-title">
                            <h4 class="title">Shiping Methods</h4>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="shipping" id="shipping-1" checked>
                            <label for="shipping-1">Free Shiping -  $0.00</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <p>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="shipping" id="shipping-2">
                            <label for="shipping-2">Standard - $4.00</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <p>
                            </div>
                        </div>
                    </div>

                    <div class="payments-methods">
                        <div class="section-title">
                            <h4 class="title">Payments Methods</h4>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="payments" id="payments-1" checked>
                            <label for="payments-1">Direct Bank Transfer</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <p>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="payments" id="payments-2">
                            <label for="payments-2">Cheque Payment</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <p>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="payments" id="payments-3">
                            <label for="payments-3">Paypal System</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <p>
                            </div>
                        </div>
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
                                    <th>SHIPING</th>
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
                            <button class="primary-btn">Place Order</button>
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