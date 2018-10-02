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
                        <input type="hidden" name="page_name" class="form-control" id="pageName"  value="<?= $page_name ?>" placeholder="Enter Brand Name">
                        <?= form_error('page_name', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="pageName">Page Details</label>
                        <textarea id="editor1" name="page_des" class="textarea" rows="10" cols="80">
<?= $page_des ?>
                        </textarea>
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