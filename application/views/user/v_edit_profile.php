<div class="col-lg-9">
    <div class="box">
        <h1>My account</h1>
        <p class="lead">Change your personal details or your password here.</p>
        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
        <h3 class="mt-5">Personal details</h3>
        <?= $this->session->flashdata('message_edit_user'); ?>
        <form action="<?= base_url('Users/C_user_profile/editprofil') ?>" method="POST">
            <div class="row">
                <p class="text-muted">Tanda (<span class="text-danger">*</span>) artinya wajib di isi</p>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap<span class="text-danger">*</span></label>
                        <input id="nama_lengkap" value="<?= $user['nama']; ?>" name="nama_lengkap" type="text" class="form-control">
                        <?= form_error('nama_lengkap', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
            </div>
            <!-- /.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="alamat_lengkap">Alamat<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="alamat_input" id="alamat_input" cols="" rows=""><?= $user['alamat']; ?></textarea>
                        <?= form_error('alamat_input', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
            </div>
            <!-- /.row-->
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="tanggal_lahir_input">Tanggal lahir<span class="text-danger">*</span></label>
                        <input id="tanggal_lahir_input" value="<?= $user['tanggal_lahir']; ?>" name="tanggal_lahir_input" type="text" class="form-control">
                        <?= form_error('tanggal_lahir_input', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="kode_pos_input">Kode Pos<span class="text-danger">*</span></label>
                        <input id="kode_pos_input" value="<?= $user['kode_pos']; ?>" name="kode_pos_input" type="text" class="form-control">
                        <?= form_error('kode_pos_input', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="nohp_input">No hp<span class="text-danger">*</span></label>
                        <input id="nohp_input" name="nohp_input" value="<?= $user['nohp']; ?>" type="number" class="form-control">
                        <?= form_error('nohp_input', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input id="email" value="<?= $user['email']; ?>" type="text" class="form-control" readonly>
                        <?= form_error('email', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>