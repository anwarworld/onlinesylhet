<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'shared/html_header.php'; ?>
    </head>
    <body>
        <div class="container" style="padding:20px;">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <form action="<?= site_url('login') ?>" method="post">
                        <?php if ($msg != ''): ?>
                            <div class="alert alert-danger alert-dismissible">
                                <i class="icon fa fa-ban"></i> <?= $msg ?>!
                            </div>
                        <?php endif; ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="userName">User Name</span>
                            </div>
                            <input type="text" name="user_name" class="form-control" placeholder="User Name" aria-label="user_name" aria-describedby="userName" />
                            <?= form_error('user_name', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="userPassword">Password</span>
                            </div>
                            <input type="password" name="user_password" class="form-control" placeholder="Password" aria-label="user_password" aria-describedby="userPassword" />
                            <?= form_error('user_password', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <button type="submit" name="signin" value="Sign in" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.login-box-body -->
        <?php common::track_uri(); ?>
    </body>
</html>
