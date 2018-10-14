<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="unitName">Unit Name</span>
            </div>
            <input type="input" name="unit_name" class="form-control" id="unitName" value="<?=$unit_name?>" placeholder="Enter Unit Name">
            <?= form_error('unit_name', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="form-group form-check">
            <label>
                <input name="unit_status" <?php echo ($unit_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio" class="form-check-input" /> Enabled
            </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                <input name="unit_status" <?php echo ($unit_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio" class="form-check-input" /> Disabled
            </label>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>