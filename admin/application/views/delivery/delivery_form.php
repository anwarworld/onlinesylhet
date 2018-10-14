<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="methodName">Delivery Method Name</span>
            </div>
            <input type="input" name="method_name" class="form-control" id="methodName"  value="<?= $method_name ?>" placeholder="Enter Method Name">
            <?= form_error('method_name', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="methodFee">Delivery Fee</span>
            </div>
            <input type="input" name="method_fee" class="form-control" id="methodFee"  value="<?= $method_fee ?>" placeholder="Enter Delivery Fee">
            <?= form_error('method_fee', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"  for="minimumFee">Minimum Shopping Amount</span>
            </div>
            <input type="input" name="method_min_amount" class="form-control" id="minimumFee"  value="<?= $method_min_amount ?>" placeholder="Enter Min. Shopping Amount">
            <?= form_error('method_min_amount', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="methodDetails">Method Details</span>
            </div>
            <textarea type="input" name="method_des" class="form-control" id="methodDetails"  placeholder="Enter Method Details"><?= $method_des ?></textarea>
            <?= form_error('method_des', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="image">Delivery Method Image</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
        <div class="form-group">
            <?php if ($method_image != ''): ?>
                <img src="../uploads/delivery/<?= $method_image ?>" alt="<?= $method_name ?>" width="50" height="50" />
                <input type="hidden" name="h_image" value="<?= $method_image ?>" />
            <?php endif; ?>
            <p class="help-block">Example: 300px X 300px.</p>
        </div>
        <div class="form-group form-check">
            <label>
                <input name="method_status" <?php echo ($method_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio" class="form-check-input" /> Enabled
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                <input name="method_status" <?php echo ($method_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio" class="form-check-input" /> Disabled
            </label>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>