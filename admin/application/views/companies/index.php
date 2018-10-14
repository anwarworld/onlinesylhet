<div class="float-sm-left">
    <a href="<?= site_url('companies/add_company') ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Add Company</a>
</div>
<div class="float-sm-right">
    <nav aria-label="Company" >
        <ul class="pagination">
            <?= $pagination_links ?>
        </ul>
    </nav>
</div>
<div class="clearfix"></div>
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
                <th>Company Name</th>
                <th></th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
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
                        <td><?= $row['company_name'] ?></td>
                        <td><img src="../uploads/companies/<?= $row['company_image'] ?>" height="50" width="50" alt="<?= $row['company_name'] ?>"/></td>
                        <td><?= $row['company_email'] ?></td>
                        <td><?= $row['company_phone'] ?></td>
                        <td><?= $row['company_address'] ?></td>
                        <td><?= ($row['company_status'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                        <td>
                            <a href="<?= site_url('companies/edit_company/' . $row['company_id']) ?>">Edit</a> |  
                            <a href="<?= site_url('companies/delete_company/' . $row['company_id']) ?>" onclick="return confirm('Are you sure to delete this company?')" >Delete</a>

                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
</div>
