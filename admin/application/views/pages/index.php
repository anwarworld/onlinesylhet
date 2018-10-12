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
                <th>Page Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($rows)) {
                foreach ($rows as $row):
                    ?>
                    <tr>
                        <td><?= $row['page_title'] ?></td>
                        <td>
                            <a href="<?= site_url('pages/' . $row['page_name']) ?>">Edit</a>  
                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Page Name</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
