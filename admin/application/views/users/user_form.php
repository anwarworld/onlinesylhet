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
            <form role="form" enctype="multipart/form-data" action="<?= $form_action ?>" method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label for="userName">User Name</label>
                        <input type="input" name="user_name" class="form-control" id="userName" value="<?= $user_name ?>" placeholder="Enter User Name">
                        <?= form_error('user_name', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="userFullName">Full Name</label>
                        <input type="input" name="user_full_name" class="form-control" id="userFullName" value="<?= $user_full_name ?>" placeholder="Enter Full Name">
                        <?= form_error('user_full_name', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email address</label>
                        <input type="email" name="user_email" class="form-control" id="userEmail" value="<?= $user_email ?>" placeholder="Enter email">
                        <?= form_error('user_email', '<span class="bg-red-active">', '</span>') ?>

                    </div>
                    <div class="form-group">
                        <label for="userPhone">Phone</label>
                        <input type="input" name="user_phone" class="form-control" id="userPhone" value="<?= $user_phone ?>" placeholder="Enter Phone">
                        <?= form_error('user_phone', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="userPassword">Password</label>
                        <input type="password" name="user_password" class="form-control" id="userPassword" value="<?= $user_password ?>" placeholder="Password">
                        <?= form_error('user_password', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="userPassword">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="userPassword" value="<?= $user_password ?>" placeholder="Confiirm Password">
                        <?= form_error('confirm_password', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="userImage">User Image</label>
                        <?php if ($user_image != ''): ?>
                            <img src="../uploads/users/<?= $user_image ?>" alt="<?= $user_name ?>" width="50" height="50" />
                            <input type="hidden" name="h_image" value="<?= $user_image ?>" />
                        <?php endif; ?>
                        <input type="file" id="userImage" name="image">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="user_status" <?php echo ($user_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio"> Enabled
                        </label>
                        <label>
                            <input name="user_status" <?php echo ($user_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio"> Disabled
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