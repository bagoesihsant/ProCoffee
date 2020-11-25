<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
    <?= $this->session->flashdata('message'); ?>
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

        <form action="<?= base_url('C_auth/lupapassword') ?>" method="post">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="<?= base_url('C_auth'); ?>">Login</a>
        </p>
        <p class="mb-0">
            <a href="<?= base_url('C_auth/registration'); ?>" class="text-center">Register a new membership</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>