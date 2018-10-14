<div class="float-sm-left">
    <a href="<?= site_url('sliders/add_slider') ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Add Slider</a>
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
                <th>Slider Name</th>
                <th>Slider Image</th>
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
                        <td><?= $row['slider_title'] ?></td>
                        <td><img src="../uploads/sliders/<?= $row['slider_image'] ?>" height="50" width="50" alt="<?= $row['slider_title'] ?>"/></td>
                        <td><?= ($row['slider_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                        <td>
                            <a href="<?= site_url('sliders/edit_slider/' . $row['slider_id']) ?>">Edit</a> |  
                            <a href="<?= site_url('sliders/delete_slider/' . $row['slider_id']) ?>" onclick="return confirm('Are you sure to delete this slider?')" >Delete</a>

                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Slider Name</th>
                <th>Slider Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>