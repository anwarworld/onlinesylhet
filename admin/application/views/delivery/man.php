<div class="float-sm-left">
    <a href="<?= site_url('delivery/add_man') ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Add Delivery Man</a>
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
                <th>Full Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Image</th>
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
                        <td><?= $row['man_fullname'] ?></td>
                        <td><?= $row['man_phone'] ?></td>
                        <td><?= $row['man_address'] ?></td>
                        <td><img src="../uploads/delivery/<?= $row['man_image'] ?>" height="50" width="50" alt="<?= $row['man_fullname'] ?>"/></td>
                        <td><?= ($row['man_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                        <td>
                            <a href="<?= site_url('delivery/edit_man/' . $row['man_id']) ?>">Edit</a> |  
                            <a href="<?= site_url('delivery/delete_man/' . $row['man_id']) ?>" onclick="return confirm('Are you sure to delete this delivery?')" >Delete</a>

                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
</div>