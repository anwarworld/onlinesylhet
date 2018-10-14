<div class="float-sm-left">
    <a href="<?= site_url('units/add_unit') ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Add Unit</a>
</div>
<div class="float-sm-right">
    <nav aria-label="Users" >
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
                <th>Unit Name</th>
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
                        <td><?= $row['unit_name'] ?></td>
                        <td><?= ($row['unit_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                        <td>
                            <a href="<?= site_url('units/edit_unit/' . $row['unit_id']) ?>">Edit</a> |  
                            <a href="<?= site_url('units/delete_unit/' . $row['unit_id']) ?>" onclick="return confirm('Are you sure to delete this unit?')" >Delete</a>

                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Unit Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>