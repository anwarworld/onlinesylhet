<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $page_title ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="input" name="company_name" class="form-control" id="companyName" value="<?= $company_name ?>" placeholder="Enter Company Name">
                        <?= form_error('company_name', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="companyEmail">Email address</label>
                        <input type="email" name="company_email" class="form-control" id="companyEmail" value="<?= $company_email ?>" placeholder="Enter email">
                        <?= form_error('company_email', '<span class="bg-red-active">', '</span>') ?>

                    </div>
                    <div class="form-group">
                        <label for="companyPhone">Phone</label>
                        <input type="input" name="company_phone" class="form-control" id="companyPhone" value="<?= $company_phone ?>" placeholder="Enter Phone">
                        <?= form_error('company_phone', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="companyAddress">Address</label>
                        <textarea type="input" name="company_address" class="form-control" id="companyAddress"  placeholder="Enter Address"><?= $company_address ?></textarea>
                        <?= form_error('company_address', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="companyImage">Category Image</label>
                        <?php if ($company_image != ''): ?>
                            <img src="../uploads/companies/<?= $company_image ?>" alt="<?= $company_name ?>" width="50" height="50" />
                            <input type="hidden" name="h_image" value="<?= $company_image ?>" />
                        <?php endif; ?>
                        <input type="file" id="companyImage" name="image">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="company_status" <?php echo ($company_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio"> Enabled
                        </label>
                        <label>
                            <input name="company_status" <?php echo ($company_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio"> Disabled
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>