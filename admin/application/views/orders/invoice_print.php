<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="<?= base_url() ?>" />
        <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>

        <title>Admin CMS 1.0.0 | Dashboard</title>

        <!-- Bootstrap core CSS -->
        <link href="tools/bootstrap.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link rel="stylesheet" href="tools/select2/dist/css/select2.min.css">

        <!-- Custom styles for this template -->
        <link href="tools/dashboard.css" rel="stylesheet">
    </head>
    <body onload="window.print();">
        <section class="invoice">
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>OnlineSylhet, Inc.</strong><br>
                        <?= nl2br($info['contact_address']) ?><br>
                        Phone: <?= $info['contact_phone'] ?><br>
                        Email: <?= $info['contact_email'] ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?= $user_full_name ?></strong><br>
                        <p><?= nl2br($user_address) ?></p>
                        Phone: <?= $user_phone ?><br>
                        Email: <?= $user_email ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?= $order_id ?></b><br>
                    <br>
                    <b>Order ID:</b> <?= $order_id ?><br>
                    <b>Payment Due:</b> <?= $order_date ?><br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
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
                                    <tr>
                                        <td class="details"><?= $row['product_name'] ?></td>
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
                                <th class="empty" colspan="2"></th>
                                <th>SUBTOTAL</th>
                                <th class="sub-total text-center">&#2547; <?= $total_amount ?></th>
                            </tr>
                            <tr>
                                <th class="empty" colspan="2"></th>
                                <th>DELIVERY FEE</th>
                                <td class="text-center">&#2547; <?= $delivery_fee ?></td>
                            </tr>
                            <tr>
                                <th class="empty" colspan="2"></th>
                                <th>TOTAL</th>
                                <th class="total text-center">&#2547; <?= $total_amount ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </body>
</html>
