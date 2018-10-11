<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <form id="checkout-form" action="<?= site_url('carts/placeOrder') ?>" method="post" class="clearfix">
                <div class="col-md-6">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Billing Details</h3>
                        </div>
                        <p><strong>Full Name:</strong> <?= $user_full_name ?></p>
                        <p><strong>Email:</strong> <?= $user_email ?></p>
                        <p><strong>Mobile:</strong> <?= $user_phone ?> </p>
                        <p class="title"><strong>Delivery Address</strong></p>
                        <p><?= nl2br($user_address) ?></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shiping-methods">
                        <div class="section-title">
                            <h4 class="title">Delivery Methods</h4>
                        </div>
                        <input type="radio" checked="checked" name="delivery_method" value="<?= $delivery_method['method_id'] ?>" id="shipping-">
                        <label for="shipping-"><?= $delivery_method['method_name'] . ' - &#2547;' . $delivery_method['method_fee'] ?></label>
                        <div class="caption">
                            <p><?= $delivery_method['method_des'] ?></p>
                        </div>
                    </div>

                    <div class="payments-methods">
                        <div class="section-title">
                            <h4 class="title">Payments Methods</h4>
                        </div>
                        <input type="radio" checked="checked" name="payment_method" value="<?= $payment_method['method_id'] ?>" id="payments-<?= $payment_method['method_id'] ?>" />
                        <label for="payments"><?= $payment_method['method_name'] ?></label>
                        <div class="caption">
                            <p><?= $payment_method['method_des'] ?></p>
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
                                            <td class="qty text-center"><?= $cart['quantity'] ?></td>
                                            <td class="total text-center product-total-<?= $cart['product_id'] ?>"><strong class="primary-color">&#2547; <?= $cart['product_price'] * $cart['quantity'] ?></strong></td>
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
                                    <th class="sub-total text-center">&#2547; <?= $carts_info['cart_total_amount'] ?></th>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>DELIVERY FEE</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>TOTAL</th>
                                    <th class="total text-center">&#2547; <?= $carts_info['cart_total_amount'] ?></th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <button class="primary-btn" type="submit" name="save" value="save" >Confirm Order</button>
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