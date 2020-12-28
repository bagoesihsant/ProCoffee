<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Akun / Reset Password</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="box">
                        <h1>Reset Password</h1>
                        <p class="lead">Ubah lah password Anda</p>
                        <p class="text-muted">Ubah password anda sesuai dengan anda ingin kan, saran <strong>Buat lah password yang mudah di ingat dan pastikan tidak ada orang yang mengetahui passwrod baru anda</strong></p>
                        <hr>
                        <form action="<?= base_url('User/ubahPasswords') ?>" method="post">
                            <div class="form-group">
                                <label for="password1">Password baru</label>
                                <input id="password1" name="password1" type="password" placeholder="Masukan password anda" class="form-control">
                                <?= form_error('password1', '<span class="text-danger">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password2">Ulangi Password</label>
                                <input id="password2" name="password2" type="password" placeholder="Ulangi password baru anda" class="form-control">
                                <?= form_error('password2', '<span class="text-danger">', '</span>'); ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>