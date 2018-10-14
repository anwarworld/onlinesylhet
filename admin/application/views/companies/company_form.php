<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"  for="companyName">Company Name</span>
            </div>
            <input type="input" name="company_name" class="form-control" id="companyName" value="<?= $company_name ?>" placeholder="Enter Company Name">
            <?= form_error('company_name', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"  for="companyEmail">Email address</span>
            </div>
            <input type="email" name="company_email" class="form-control" id="companyEmail" value="<?= $company_email ?>" placeholder="Enter email">
            <?= form_error('company_email', '<span class="bg-red-active">', '</span>') ?>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"  for="companyPhone">Phone</span>
            </div>
            <input type="input" name="company_phone" class="form-control" id="companyPhone" value="<?= $company_phone ?>" placeholder="Enter Phone">
            <?= form_error('company_phone', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"  for="companyAddress">Address</span>
            </div>
            <textarea type="input" name="company_address" class="form-control" id="companyAddress"  placeholder="Enter Address"><?= $company_address ?></textarea>
            <?= form_error('company_address', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="image">Company Image</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image">
                <label class="custom-file-label" for="image">Choose file</label>

            </div>
        </div>
        <div class="form-group">
            <?php if ($company_image != ''): ?>
                <img src="../uploads/companies/<?= $company_image ?>" alt="<?= $company_name ?>" width="50" height="50" />
                <input type="hidden" name="h_image" value="<?= $company_image ?>" />
            <?php endif; ?>
            <p class="help-block">[Width X Height]: 700px X 600px</p>
        </div>
        <div class="form-group form-check">
            <label>
                <input name="company_status" <?php echo ($company_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio" class="form-check-input" /> Enabled
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                <input name="company_status" <?php echo ($company_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio" class="form-check-input" /> Disabled
            </label>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>