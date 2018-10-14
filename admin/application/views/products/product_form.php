<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="productType">Product Type</label>
            </div>
            <select name="product_type" class="custom-select" id="productType">
                <?php
                foreach ($product_types as $key => $value):
                    ?>
                    <option <?php echo ($key == $product_type) ? 'selected="selected"' : ''; ?> value="<?= $key ?>"><?= $value ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="productCategory">Product Category</label>
            </div>
            <select name="category" class="custom-select" id="productCategory">
                <?php
                foreach ($parent_cateories as $row):
                    ?>
                    <option <?php echo ($row['category_id'] == $category_id) ? 'selected="selected"' : ''; ?> value="<?= $row['category_id'] . ':' . $row['category_name'] ?>"><?= $row['category_name'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="productBrand">Product Brand</label>
            </div>
            <select name="brand" class="custom-select" id="productBrand">
                <?php
                foreach ($brands as $row):
                    ?>
                    <option <?php echo ($row['brand_id'] == $brand_id) ? 'selected="selected"' : ''; ?> value="<?= $row['brand_id'] . ':' . $row['brand_name'] ?>"><?= $row['brand_name'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="productSeller">Product Seller</label>
            </div>
            <select name="seller" class="custom-select" id="productBrand">
                <?php
                foreach ($sellers as $row):
                    ?>
                    <option <?php echo ($row['seller_id'] == $seller_id) ? 'selected="selected"' : ''; ?> value="<?= $row['seller_id'] . ':' . $row['seller_name'] ?>"><?= $row['seller_name'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="productName">Product Name</span>
            </div>
            <input type="input" name="product_name" class="form-control" id="productName" value="<?= $product_name ?>" placeholder="Enter Product Name">
            <?= form_error('product_name', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="productRegularPrice">Product Regular Price</span>
            </div>
            <input type="input" name="product_regular_price" class="form-control" id="productRegularPrice" value="<?= $product_regular_price ?>" placeholder="Enter Product Regular Price">
            <?= form_error('product_regular_price', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="productDiscount">Product Discount</span>
            </div>
            <input type="input" name="product_discount" class="form-control" id="productDiscount" value="<?= $product_discount ?>" placeholder="Enter Product Discount Percentage">
            <?= form_error('product_discount', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="productPrice">Product Price</span>
            </div>
            <input type="input" name="product_price" class="form-control" id="productPrice" value="<?= $product_price ?>" placeholder="Enter Product Price">
            <?= form_error('product_price', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="productPriceUnit">Product Price Unit</span>
            </div>
            <input type="input" name="product_price_unit" class="form-control" id="productPriceUnit" value="<?= $product_price_unit ?>" placeholder="Enter Price by unit">
            <?= form_error('product_price_unit', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="productDetails">Product Details</span>
            </div>
            <textarea type="input" name="product_details" class="form-control" id="productDetails"  placeholder="Enter Product Details"><?= $product_details ?></textarea>
            <?= form_error('product_details', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="image">Product Image</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
        <div class="form-group">
            <?php if ($product_image != ''): ?>
                <img src="../uploads/products/<?= $product_image ?>" alt="<?= $product_name ?>" width="50" height="50" />
                <input type="hidden" name="h_image" value="<?= $product_image ?>" />
            <?php endif; ?>
            <p class="help-block">[Width X Height]: 700px X 600px</p>
        </div>
        <div class="form-group form-check">
            <label><input name="product_status" <?php echo ($product_status == 1) ? 'checked="checked"' : ''; ?> value="1"  class="form-check-input" type="radio">Enabled</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input name="product_status" <?php echo ($product_status == 0) ? 'checked="checked"' : ''; ?> value="0" class="form-check-input" type="radio">Disabled</label>
        </div>
        <div class="box-footer">
            <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>