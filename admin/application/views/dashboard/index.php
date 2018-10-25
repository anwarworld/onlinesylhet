<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4>New Orders</h4>
        <div class="table-responsive">
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
                    if (isset($orders)) {
                        foreach ($orders as $row):
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
    </div> 
</div>
<div class="row">
    <div class="col-md-6">
        <h4>New Members</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($users)) {
                        foreach ($users as $row):
                            ?>
                            <tr>
                                <td><?= $row['user_full_name'] ?></td>
                                <td><?= $row['user_email'] ?></td>
                                <td><?= $row['user_phone'] ?></td>
                                <td>
                                    <a href="<?= site_url('users/edit_user/' . $row['user_id']) ?>">Edit</a> |  
                                    <a href="<?= site_url('users/delete_user/' . $row['user_id']) ?>" onclick="return confirm('Are you sure to delete this user?')" >Delete</a>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
