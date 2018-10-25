<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="manName">Delivery Name Name</span>
            </div>
            <input type="input" name="man_fullname" class="form-control" id="manName"  value="<?= $man_fullname ?>" placeholder="Enter Full Name">
            <?= form_error('man_fullname', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="manPhone">Phone</span>
            </div>
            <input type="input" name="man_phone" class="form-control" id="manPhone"  value="<?= $man_phone ?>" placeholder="Enter Phone">
            <?= form_error('man_phone', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="manAddress">Addres</span>
            </div>
            <textarea type="input" name="man_address" class="form-control" id="manAddress"  placeholder="Enter Address"><?= $man_address ?></textarea>
            <?= form_error('man_address', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="image">Delivery Man Image</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
        <div class="form-group">
            <?php if ($man_image != ''): ?>
                <img src="../uploads/delivery/<?= $man_image ?>" alt="<?= $man_fullname ?>" width="50" height="50" />
                <input type="hidden" name="h_image" value="<?= $man_image ?>" />
            <?php endif; ?>
            <p class="help-block">Example: 300px X 300px.</p>
        </div>
        <div class="form-group form-check">
            <label>
                <input name="man_status" <?php echo ($man_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio" class="form-check-input" /> Enabled
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                <input name="man_status" <?php echo ($man_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio" class="form-check-input" /> Disabled
            </label>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>