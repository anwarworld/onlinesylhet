<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $page_title ?></h3>
                <a href="<?= site_url('categories/add_category') ?>"><i class="fa fa-user-plus"></i>Add Category</a>

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
                            <th>Parent Category</th>
                            <th>Category image</th>
                            <th>Category Name</th>
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
                                    <td><?= $row['parent_cat_name'] ?></td>
                                    <td><img src="../uploads/categories/<?= $row['category_image'] ?>" height="50" width="50" alt="<?= $row['category_name'] ?>"/></td>
                                    <td><?= $row['category_name'] ?></td>
                                    <td><?= ($row['category_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                                    <td>
                                        <a href="<?= site_url('categories/edit_category/' . $row['category_id']) ?>">Edit</a> |  
                                        <a href="<?= site_url('categories/delete_category/' . $row['category_id']) ?>" onclick="return confirm('Are you sure to delete this category?')" >Delete</a>

                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Parent Category</th>
                            <th>Category Name</th>
                            <th>Category image</th>
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
