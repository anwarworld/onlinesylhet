<!--<div class="float-sm-left">
    <a href="<?= site_url('categories/add_category') ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Add Category</a>
</div>-->
<div class="float-sm-right">
    <nav aria-label="Users" >
        <ul class="pagination">
            <?= $pagination_links ?>
        </ul>
    </nav>
</div>

<div class="table-responsive">
    <?php if ($msg != ''): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> <?= $msg ?></h4>
        </div>
    <?php endif; ?>
    <table class="table table-striped table-sm">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Date</th>
                <th>#Quantity</th>
                <th>#Amount</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($rows)) {
                foreach ($rows as $row):
                    ?>
                    <tr>
                        <td><?= $row['order_id'] ?></td>
                        <td><?= $row['user_full_name'] . '<br/>' . $row['user_phone'] ?></td>
                        <td><?= nl2br($row['user_address']) ?></td>
                        <td><?= $row['order_date'] ?></td>
                        <td class="text-center"><?= $row['total_quantity'] ?></td>
                        <td class="text-right">&#2547; <?= $row['total_amount'] ?></td>
                        <td><?php
                            echo $this->orders_mod->getDeliveryStatus($row['delivery_status']) . '<br/>';
                            echo $row['man_fullname'] . '<br/>';
                            echo $row['man_phone'];
                            ?></td>
                        <td>
                            <?php
                            $orderData = array(
                                'order_id' => $row['order_id'],
                                'order_transaction_id' => $row['order_transaction_id'],
                                'order_date' => $row['order_date'],
                                'user_full_name' => $row['user_full_name'],
                                'user_phone' => $row['user_phone'],
                                'user_address' => $row['user_address'],
                                'total_amount' => $row['total_amount'],
                                'total_quantity' => $row['total_quantity']
                            );
                            ?>
                            <a href="#" data-toggle="modal" data-target="#deliveryModal" data-whatever='<?= json_encode($orderData) ?>'> Add Delivery</a> | 
                            <a href="<?= site_url('orders/invoice/' . $row['order_id']) ?>">Invoice</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="deliveryModal" tabindex="-1" role="dialog" aria-labelledby="deliveryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deliveryModalLabel">Add Delivery Option</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="order-update">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-6">
                            To
                            <address class="order-by">
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-data">
                        </div>
                        <input type="hidden" name="order_id" value="" class="order-id" />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="deliveryStatus">Delivery Status</label>
                        </div>
                        <select name="delivery_status" class="form-control" id="deliveryStatus">
                            <?php
                            foreach ($status_rows as $key => $row):
                                ?>
                                <option value="<?= $key ?>"><?= $row ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="deliveryMan">Delivery Man</label>
                        </div>
                        <select name="delivery_man" class="form-control" id="deliveryMan">
                            <option value="0:No Delivery Man:00000000">---CHOOSE---</option>
                            <?php
                            foreach ($man_rows as $row):
                                ?>
                                <option value="<?= $row['man_id'] . ':' . $row['man_fullname'] . ':' . $row['man_phone'] ?>"><?= $row ['man_fullname'] ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Order</button>
                </div>
            </form>
        </div>
    </div>
</div>