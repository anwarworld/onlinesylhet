<div class="table-responsive">
    <?php if ($msg != ''): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> <?= $msg ?></h4>
        </div>
    <?php endif; ?>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Category</th>
                <th>Product image</th>
                <th>Product Name</th>
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
                        <td><?= $row['category_name'] ?></td>
                        <td><img src="../uploads/products/<?= $row['product_image'] ?>" height="50" width="50" alt="<?= $row['product_name'] ?>"/></td>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= ($row['product_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                        <td>
                            <a href="<?= site_url('products/edit_product/' . $row['product_id']) ?>">Edit</a> |  
                            <a href="<?= site_url('products/delete_product/' . $row['product_id']) ?>" onclick="return confirm('Are you sure to delete this product?')" >Delete</a>

                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Parent Product</th>
                <th>Product Name</th>
                <th>Product image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>