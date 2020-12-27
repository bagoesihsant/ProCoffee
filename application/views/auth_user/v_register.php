<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('User/LandingPage') ?>">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">New account / Sign in</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6">
                    <div class="box">

                        <h1>Daftar / Register</h1>
                        <p class="lead">Masih belum mendaftarkan diri ke website kami?</p>
                        <p>Dengan register di website kami, anda akan mendapatkan email veritifikasi untuk mengaktifkan akun anda agar bisa login di website kami, dan melakukan transaksi produk kami</p>
                        <!-- <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p> -->
                        <?= $this->session->flashdata('message_register'); ?>
                        <hr>
                        <form action="<?= base_url('User/Register') ?>" method="POST">
                            <div class="form-group">
                                <label for="name_input">Nama</label>
                                <input id="name_input" name="name_input" type="text" value="<?= set_value('name_input'); ?>" placeholder="Nama Lengkap Anda" class="form-control">
                                <?= form_error('name_input', '<span class="text-danger">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email_input">Email</label>
                                <input id="email_input" name="email_input" type="text" value="<?= set_value('email_input'); ?>" placeholder="Email Anda" class="form-control">
                                <?= form_error('email_input', '<span class="text-danger">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password_satu">Password</label>
                                <input id="password_satu" name="password_satu" type="password" placeholder="Password anda" class="form-control">
                                <?= form_error('password_satu', '<span class="text-danger">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password_dua">Ulangi Password</label>
                                <input id="password_dua" name="password_dua" type="password" placeholder="Password anda" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- login open -->
                <div class="col-lg-6">
                    <div class="box">
                        <h1>Login</h1>
                        <p class="lead">Sudah punya akun?</p>
                        <p class="text-muted">Silahkan Login di sini</p>
                        <hr>
                        <?= $this->session->flashdata('message_login'); ?>
                        <form action="<?= base_url('User/Masuk') ?>" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" value="<?= set_value('email'); ?>" type="text" class="form-control">
                                <?= form_error('email', '<span class="text-danger">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control">
                                <?= form_error('password', '<span class="text-danger">', '</span>'); ?>
                            </div>
                            <p><a href="<?= base_url('User/LupaSandi') ?>">Lupa Password?</a></p>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>