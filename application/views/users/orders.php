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
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Order ID</th>
                            <th>Order By</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Total</th>
                            <th class="text-center">Delivered By</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($rows) && count($rows) > 0) :
                            foreach ($rows as $row) :
                                ?>
                                <tr class="text-center">
                                    <td><?= $row['order_transaction_id'] ?></td>
                                    <td>
                                        <a href="<?= site_url('users/order_details/' . $row['order_id'] . '/' . $row['order_transaction_id']) ?>"><?= $row['user_full_name'] ?></a>
                                    </td>
                                    <td><?= $row['order_date'] ?></td>
                                    <td class="price text-center"><strong><?= $row['total_quantity'] ?></strong></td>
                                    <td class="price text-right primary-color"><strong>&#2547; <?= $row['total_amount'] ?></strong></td>
                                    <td class="total text-center"><?= $row['delivery_name'] ?></td>
                                    <td class="total text-center"><?= $row['delivery_status'] ?></td>
                                </tr>
                                <?php
                            endforeach;
                        else :
                            echo ' <tr><td colspan="6">Sorry! Your cart is empty.</td></tr>';
                        endif;
                        ?>
                    </tbody>
<!--                    <tfoot>
                        <tr>
                            <th>Order ID</th>
                            <th class="text-center">Order By</th>
                            <th class="text-right">Date</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-right">Delivery Man Name</th>
                            <th class="text-right">Status</th>
                        </tr>
                    </tfoot>-->
                </table>
            </div>
        </div>
    </div>

</div>