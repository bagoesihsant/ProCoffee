<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- breadcrumb-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Lupas password</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="box">

                        <h1>Lupa Password</h1>
                        <p class="lead">Anda telah melupakan password?</p>
                        <p class="text-muted">Jangan Panik anda bisa melakukan reset password jika anda memasukan email yang terhubung dengan akun anda, lalu sistem akan mengirim kan email untuk mengantarkan anda ke halaman reset password</p>
                        <?= $this->session->flashdata('message_forgot'); ?>
                        <hr>
                        <form action="<?= base_url('User/LupaSandi'); ?>" method="post">
                            <div class="form-group">
                                <label for="email_input">Email</label>
                                <input id="email_input" name="email_input" type="text" placeholder="Masukan Email anda" class="form-control">
                                <?= form_error('email_input', '<span class="text-danger">', '</span>'); ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-recycle"></i> Reset Password</button>
                            </div>
                        </form>
                        <br>
                        <p><a href="<?= base_url('User/Register'); ?>">Kembali Ke halaman Sign in / Sign out</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>