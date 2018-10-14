<div class="float-sm-left">
    <a href="<?= site_url('sellers/add_seller') ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Add Seller</a>
</div>
<div class="float-sm-right">
    <nav aria-label="Sellers" >
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
                <th>Seller Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Address</th>
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
                        <td><?= $row['seller_name'] ?></td>
                        <td><?= $row['seller_email'] ?></td>
                        <td><?= $row['seller_phone'] ?></td>
                        <td><?= $row['seller_city'] ?></td>
                        <td><?= $row['seller_address'] ?></td>
                        <td><?= ($row['seller_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                        <td>
                            <a href="<?= site_url('sellers/edit_seller/' . $row['seller_id']) ?>">Edit</a> |  
                            <a href="<?= site_url('sellers/delete_seller/' . $row['seller_id']) ?>" onclick="return confirm('Are you sure to delete this seller?')" >Delete</a>

                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
</div>
