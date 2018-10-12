<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-3">
                <?php include_once 'side_bar.php'; ?>
            </div>
            <!-- /ASIDE -->
            <!-- MAIN -->
            <div id="main" class="col-md-9">
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
<!--                        <input type="radio" checked="checked" name="delivery_method" value="<?= $delivery_method['method_id'] ?>" id="shipping-">
    <label for="shipping-"><?= $delivery_method['method_name'] . ' - &#2547;' . $delivery_method['method_fee'] ?></label>
    <div class="caption">
        <p><?= $delivery_method['method_des'] ?></p>
    </div>-->
                    </div>

                    <div class="payments-methods">
                        <div class="section-title">
                            <h4 class="title">Payments Methods</h4>
                        </div>
<!--                        <input type="radio" checked="checked" name="payment_method" value="<?= $payment_method['method_id'] ?>" id="payments-<?= $payment_method['method_id'] ?>" />
                        <label for="payments"><?= $payment_method['method_name'] ?></label>
                        <div class="caption">
                            <p><?= $payment_method['method_des'] ?></p>
                        </div>-->
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
                                $order_data = json_decode($order_data, TRUE);
                                if (is_array($order_data) && count($order_data) > 0) :
                                    foreach ($order_data as $row) :
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
                                            <td class="qty text-center"><?= $row['quantity'] ?></td>
                                            <td class="total text-center product-total-<?= $row['product_id'] ?>"><strong class="primary-color">&#2547; <?= $row['product_price'] * $row['quantity'] ?></strong></td>
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
                                    <th class="sub-total text-center">&#2547; <?= $total_amount ?></th>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>DELIVERY FEE</th>
                                    <td class="text-center">&#2547; <?= $delivery_fee ?></td>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>TOTAL</th>
                                    <th class="total text-center">&#2547; <?= $total_amount ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->