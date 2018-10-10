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
                        <label for="methodName">Delivery Method Name</label>
                        <input type="input" name="method_name" class="form-control" id="methodName"  value="<?= $method_name ?>" placeholder="Enter Method Name">
                        <?= form_error('method_name', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="methodFee">Delivery Fee</label>
                        <input type="input" name="method_fee" class="form-control" id="methodFee"  value="<?= $method_fee ?>" placeholder="Enter Delivery Fee">
                        <?= form_error('method_fee', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="methodFee">Minimum Shopping Amount</label>
                        <input type="input" name="method_min_amount" class="form-control" id="methodFee"  value="<?= $method_min_amount ?>" placeholder="Enter Min. Shopping Amount">
                        <?= form_error('method_min_amount', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="methodDetails">Method Details</label>
                        <textarea type="input" name="method_des" class="form-control" id="methodDetails"  placeholder="Enter Method Details"><?= $method_des ?></textarea>
                        <?= form_error('method_des', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="methodImage">Delivery Method Image</label>
                        <?php if ($method_image != ''): ?>
                            <img src="../uploads/delivery/<?= $method_image ?>" alt="<?= $method_name ?>" width="50" height="50" />
                            <input type="hidden" name="h_image" value="<?= $method_image ?>" />
                        <?php endif; ?>
                        <input type="file" id="paymentImage" name="image">
                        <p class="help-block">Example: 300px X 300px.</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="method_status" <?php echo ($method_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio"> Enabled
                        </label>
                        <label>
                            <input name="method_status" <?php echo ($method_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio"> Disabled
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