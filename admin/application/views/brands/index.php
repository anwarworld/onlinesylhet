<div class="float-sm-left">
    <a href="<?= site_url('brands/add_brand') ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Add Brand</a>
</div>
<div class="float-sm-right">
    <nav aria-label="Brands" >
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
                <th>Brand Name</th>
                <th>Brand Image</th>
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
                        <td><?= $row['brand_name'] ?></td>
                        <td><img src="../uploads/brands/<?= $row['brand_image'] ?>" height="50" width="50" alt="<?= $row['brand_name'] ?>"/></td>
                        <td><?= ($row['brand_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                        <td>
                            <a href="<?= site_url('brands/edit_brand/' . $row['brand_id']) ?>">Edit</a> |  
                            <a href="<?= site_url('brands/delete_brand/' . $row['brand_id']) ?>" onclick="return confirm('Are you sure to delete this brand?')" >Delete</a>

                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
</div>
