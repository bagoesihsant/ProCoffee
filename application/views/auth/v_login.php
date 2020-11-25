<p class="login-box-msg">Silahkan Login dan Masukan Username/Email dan Password anda!</p>
<?= $this->session->flashdata('message'); ?>
<form class="user" action="<?= base_url('C_auth'); ?>" method="post">
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-user" placeholder="Email/Username" id="email" name="email" value="<?= set_value('email') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
    </div>
    
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="password" class="form-control form-control-user" placeholder="Password" id="password" name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
    </div>
    <div class="row">
        <!-- /.col -->
        <div class="col-md">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>


<p class="mb-1">
    Lupa Password ? <a href="<?= base_url('C_auth/lupapassword'); ?>">Klik Disini!</a>
</p>
<p class="mb-0">
    Daftar Baru ? <a href="<?= base_url('C_auth/registration'); ?>" class="text-center">Daftar User Baru</a>
</p>
</div>
<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->