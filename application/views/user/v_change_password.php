<div class="col-lg-9">
    <div class="box">
        <h1>Ubah Password</h1>
        <p class="lead">Ubah Password mu bisa melalui menu ini.</p>
        <p class="text-muted">Password lama di butuhkan untuk memastikan bahwa yang mengubah akun adalah orang yang memiliki akun ini atau memiliki tanggung jawab atas akun ini</p>
        <h3>Change password</h3>
        <?= $this->session->flashdata('message_change_password'); ?>
        <form action="<?= base_url('User/Profile/ChangePassword'); ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_old">Old password</label>z
                        <input id="password_old" name="password_old" type="password" class="form-control">
                        <?= form_error('password_old', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_1">New password</label>
                        <input id="password_1" name="password_1" type="password" class="form-control">
                        <?= form_error('password_1', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_2">Retype new password</label>
                        <input id="password_2" name="password_2" type="password" class="form-control">
                        <?= form_error('password_2', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
            </div>
            <!-- /.row-->
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Password Baru</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>