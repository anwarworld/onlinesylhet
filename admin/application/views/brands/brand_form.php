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
                        <label for="brandName">Brand Name</label>
                        <input type="input" name="brand_name" class="form-control" id="brandName"  value="<?=$brand_name?>" placeholder="Enter Brand Name">
                        <?= form_error('brand_name', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="brandImage">Brand Image</label>
                        <?php if ($brand_image != ''): ?>
                            <img src="../uploads/brands/<?= $brand_image ?>" alt="<?= $brand_name ?>" width="50" height="50" />
                            <input type="hidden" name="h_image" value="<?= $brand_image ?>" />
                        <?php endif; ?>
                        <input type="file" id="brandImage" name="image">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="brand_status" <?php echo ($brand_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio"> Enabled
                        </label>
                        <label>
                            <input name="brand_status" <?php echo ($brand_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio"> Disabled
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