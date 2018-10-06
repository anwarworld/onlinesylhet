<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $page_title ?></h3>
                <a href="<?= site_url('payments/add_payment') ?>"><i class="fa fa-user-plus"></i>Add Payment</a>
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
                            <th>Method Name</th>
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
                                    <td><?= $row['method_des'] ?></td>
                                    <td><img src="../uploads/payments/<?= $row['method_image'] ?>" height="50" width="50" alt="<?= $row['method_name'] ?>"/></td>
                                    <td><?= ($row['method_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                                    <td>
                                        <a href="<?= site_url('payments/edit_payment/' . $row['method_id']) ?>">Edit</a> |  
                                        <a href="<?= site_url('payments/delete_payment/' . $row['method_id']) ?>" onclick="return confirm('Are you sure to delete this payment?')" >Delete</a>

                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Method Name</th>
                            <th>Method Details</th>
                            <th>Method Image</th>
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
