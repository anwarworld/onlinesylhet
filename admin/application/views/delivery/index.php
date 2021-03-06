<div class="float-sm-left">
    <a href="<?= site_url('delivery/add_method') ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Add Delivery Method</a>
</div>
<div class="float-sm-right">
    <nav aria-label="DeliveryMethod" >
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
                <th>Method Name</th>
                <th>Delivery Fee</th>
                <th>Min. Shopping</th>
                <th>Method Details</th>
                <th>Method Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($rows)) {
                foreach ($rows as $row):
                    ?>
                    <tr>
                        <td><?= $row['method_name'] ?></td>
                        <td><?= $row['method_fee'] ?></td>
                        <td><?= $row['method_min_amount'] ?></td>
                        <td><?= word_limiter($row['method_des'], 6) ?></td>
                        <td><img src="../uploads/delivery/<?= $row['method_image'] ?>" height="50" width="50" alt="<?= $row['method_name'] ?>"/></td>
                        <td><?= ($row['method_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                        <td>
                            <a href="<?= site_url('delivery/edit_method/' . $row['method_id']) ?>">Edit</a> |  
                            <a href="<?= site_url('delivery/delete_method/' . $row['method_id']) ?>" onclick="return confirm('Are you sure to delete this delivery?')" >Delete</a>

                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
</div>