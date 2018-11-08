<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
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
                                        <td class="qty text-center"><input class="input quantity-value-change" rel="<?= $row['quantity'] ?>" title="<?= $row['product_id'] ?>" type="number" value="<?= $row['quantity'] ?>"></td>
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
                                <th>TOTAL</th>
                                <th colspan="2" class="total">&#2547; <?= $carts_info['cart_total_amount'] ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="pull-right">
                        <a href="<?= site_url('products') ?>" title="Continue to shopping" class="primary-btn">Continue to Shopping</a> <a href="<?= site_url('carts/checkout') ?>" title="Checkout" class="primary-btn">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->