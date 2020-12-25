<div class="col-lg-9">
    <div class="box">
        <h1>My account</h1>
        <p class="lead">Change your personal details or your password here.</p>
        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
        <h3 class="mt-5">Personal details</h3>
        <form>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input id="nama_lengkap" value="<?= $user['nama']; ?>" name="nama_lengkap" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <!-- /.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="alamat_lengkap">Alamat</label>
                        <textarea class="form-control" name="alamat_input" id="alamat_input" cols="" rows=""><?= $user['alamat']; ?></textarea>
                    </div>
                </div>
            </div>
            <!-- /.row-->
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="tanggal_lahir_input">Tanggal lahir</label>
                        <input id="tanggal_lahir_input" value="<?= $user['tanggal_lahir']; ?>" name="tanggal_lahir_input" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="kode_pos_input">Kode Pos</label>
                        <input id="kode_pos_input" value="<?= $user['kode_pos']; ?>" name="kode_pos_input" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="nohp_input">No hp</label>
                        <input id="nohp_input" name="nohp_input" value="<?= $user['nohp']; ?>" type="number" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" value="<?= $user['email']; ?>" type="text" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>