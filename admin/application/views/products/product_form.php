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
                        <label>Product Category</label>
                        <select name="category" class="form-control select2">
                            <?php
                            foreach ($parent_cateories as $row):
                                ?>
                                <option <?php echo ($row['category_id'] == $category_id) ? 'selected="selected"' : ''; ?> value="<?= $row['category_id'] . ':' . $row['category_name'] ?>"><?= $row['category_name'] ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select name="brand" class="form-control select2">
                            <?php
                            foreach ($brands as $row):
                                ?>
                                <option <?php echo ($row['brand_id'] == $brand_id) ? 'selected="selected"' : ''; ?> value="<?= $row['brand_id'] . ':' . $row['brand_name'] ?>"><?= $row['brand_name'] ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Seller</label>
                        <select name="seller" class="form-control select2">
                            <?php
                            foreach ($sellers as $row):
                                ?>
                                <option <?php echo ($row['seller_id'] == $seller_id) ? 'selected="selected"' : ''; ?> value="<?= $row['seller_id'] . ':' . $row['seller_name'] ?>"><?= $row['seller_name'] ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="input" name="product_name" class="form-control" id="productName" value="<?= $product_name ?>" placeholder="Enter Product Name">
                        <?= form_error('product_name', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="productRegularPrice">Product Regular Price</label>
                        <input type="input" name="product_regular_price" class="form-control" id="productName" value="<?= $product_regular_price ?>" placeholder="Enter Product Regular Price">
                        <?= form_error('product_regular_price', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="productDiscount">Product Discount</label>
                        <input type="input" name="product_discount" class="form-control" id="productDiscount" value="<?= $product_discount ?>" placeholder="Enter Product Discount Percentage">
                        <?= form_error('product_discount', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Product Price</label>
                        <input type="input" name="product_price" class="form-control" id="productPrice" value="<?= $product_price ?>" placeholder="Enter Product Price">
                        <?= form_error('product_price', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="productPriceUnit">Product Price Unit</label>
                        <input type="input" name="product_price_unit" class="form-control" id="productPriceUnit" value="<?= $product_price_unit ?>" placeholder="Enter Price by unit">
                        <?= form_error('product_price_unit', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="productDetails">Product Details</label>
                        <textarea type="input" name="product_details" class="form-control" id="productDetails"  placeholder="Enter Product Details"><?= $product_details ?></textarea>
                        <?= form_error('product_details', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Product Image</label>
                        <?php if ($product_image != ''): ?>
                            <img src="../uploads/products/<?= $product_image ?>" alt="<?= $product_name ?>" width="50" height="50" />
                            <input type="hidden" name="h_image" value="<?= $product_image ?>" />
                        <?php endif; ?>
                        <input type="file" id="productImage" name="image">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="product_status" <?php echo ($product_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio"> Enabled
                        </label>
                        <label>
                            <input name="product_status" <?php echo ($product_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio"> Disabled
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