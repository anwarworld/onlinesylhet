<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div class="col-md-3">
                <?php include_once 'side_bar.php'; ?>
            </div>
            <!-- /ASIDE -->
            <!-- MAIN -->
            <div id="main" class="col-md-9">
                <?php if ($msg != ''): ?>
                    <div class="alert alert-success alert-dismissible">
                        <h4><i class="icon fa fa-check"></i> <?= $msg ?></h4>
                    </div>
                <?php endif; ?>
                <div class="section-title">
                    <h4 class="title">My Order History</h4>
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
                        if (is_array($rows) && count($rows) > 0) :
                            foreach ($rows as $cart) :
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
                                    <td class="qty text-center"><input class="input quantity-value-change" rel="<?= $cart['quantity'] ?>" title="<?= $cart['product_id'] ?>" type="number" value="<?= $cart['quantity'] ?>"></td>
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
<!--                            <tr>
                            <th class="empty" colspan="3"></th>
                            <th>SHIPING</th>
                            <td colspan="2">Free Shipping</td>
                        </tr>-->
                        <tr>
                            <th class="empty" colspan="3"></th>
                            <th>TOTAL</th>
                            <th colspan="2" class="total">&#2547; <?= $carts_info['cart_total_amount'] ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>