<div class="table-responsive">
    <a href="<?= site_url('users/add_user') ?>"><span data-feather="user-plus"></span>Add User</a>
    <?php if ($msg != ''): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> <?= $msg ?></h4>
        </div>
    <?php endif; ?>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
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
                        <td><?= $row['user_name'] ?></td>
                        <td><?= $row['user_full_name'] ?></td>
                        <td><?= $row['user_email'] ?></td>
                        <td><?= $row['user_phone'] ?></td>
                        <td><?= ($row['user_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
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
        <tfoot>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>