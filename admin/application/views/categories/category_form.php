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
                        <label>Parent Category</label>
                        <select name="parent_cat" class="form-control select2">
                            <option  value="0:Main Category">Main Category</option>
                            <?php
                            foreach ($parent_cateories as $row):
                                ?>
                                <option <?php echo ($row['category_id'] == $parent_cat_id) ? 'selected="selected"' : ''; ?> value="<?= $row['category_id'] . ':' . $row['category_name'] ?>"><?= $row['category_name'] ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="input" name="category_name" class="form-control" id="categoryName" value="<?= $category_name ?>" placeholder="Enter Category Name">
                        <?= form_error('category_name', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="categoryImage">Category Image</label>
                        <?php if ($category_image != ''): ?>
                            <img src="../uploads/categories/<?= $category_image ?>" alt="<?= $category_name ?>" width="50" height="50" />
                            <input type="hidden" name="h_image" value="<?= $category_image ?>" />
                        <?php endif; ?>
                        <input type="file" id="categoryImage" name="image">
                        <p class="help-block">[Width X Height]: 700px X 600px</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="category_status" <?php echo ($category_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio"> Enabled
                        </label>
                        <label>
                            <input name="category_status" <?php echo ($category_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio"> Disabled
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