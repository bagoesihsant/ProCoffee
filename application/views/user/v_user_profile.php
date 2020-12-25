<div class="col-lg-9">
    <div class="box">
        <h1>Akun Saya</h1>
        <p class="lead">Ini adalah halaman akun anda atau bio anda</p>
        <p class="text-muted">Jika ingin mengubah atau melengkapi data silahkan klik menu edit profile</p>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="font-weight-bold">Nama Lengkap</label>
                    <p><?= $user['nama']; ?></p>
                </div>
            </div>
        </div>
        <!-- /.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="font-weight-bold">Alamat</label>
                    <?php if (!$user['alamat']) : ?>
                        <br>
                        <p class="badge bg-warning">Belum ada alamat!</p>
                    <?php else : ?>
                        <p><?= $user['alamat']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /.row-->
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="font-weight-bold">tanggal lahir</label>
                    <?php if (!$user['tanggal_lahir']) : ?>
                        <p class="badge bg-warning">Tanggal lahir belum di masukkan!</p>
                    <?php else : ?>
                        <p><?= $user['tanggal_lahir']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="font-weight-bold">Kode Pos</label>
                    <?php if (!$user['kode_pos']) : ?>
                        <br>
                        <p class="badge bg-warning">kode pos belum di masukkan!</p>
                    <?php else : ?>
                        <p><?= $user['kode_pos']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="font-weight-bold">No hp</label>
                    <?php if (!$user['nohp']) : ?>
                        <br>
                        <p class="badge bg-warning">Nomor Hp belum di masukkan!</p>
                    <?php else : ?>
                        <p><?= $user['nohp']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <p><?= $user['email']; ?></p>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="<?= base_url('User/Profile/Edit'); ?>" class="btn btn-primary"><i class="fa fa-save"></i> Edit Profile</a>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>
</div>