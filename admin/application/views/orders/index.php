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
                <th>Phone</th>
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
                        <td><?= $row['user_full_name'] ?></td>
                        <td><?= $row['user_phone'] ?></td>
                        <td><?= nl2br($row['user_address']) ?></td>
                        <td><?= $row['order_date'] ?></td>
                        <td class="text-center"><?= $row['total_quantity'] ?></td>
                        <td class="text-right">&#2547; <?= $row['total_amount'] ?></td>
                        <td><?= ($row['order_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                        <td>
                            <a href="<?= site_url('orders/delivery/' . $row['order_id']) ?>"> Add Delivery</a> | 
                            <a href="<?= site_url('orders/details/' . $row['order_id']) ?>">Details</a> |  
                            <a href="<?= site_url('categories/delete_category/' . $row['category_id']) ?>" onclick="return confirm('Are you sure to delete this category?')" >Delete</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
</div>
