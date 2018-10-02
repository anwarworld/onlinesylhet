<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $page_title ?></h3>
                <a href="<?= site_url('products/add_product') ?>"><i class="fa fa-user-plus"></i>Add Product</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if ($msg != ''): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> <?= $msg ?></h4>
                    </div>
                <?php endif; ?>
                <table id="example2" class="table table-bordered table-hover">
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
