<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() . "home"; ?>">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">New account</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg">
              <div class="box">
                <h1>Form Register</h1>
                <p class="lead">Belum daftar akun kan?</p>
                <p>Silahkan daftar akun anda dan isi pada form yang telah tersedia</p>
                <hr>
                <form method="POST" action="<?= base_url('home/register'); ?>">
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" name="nama" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password1">Ulangi Password</label>
                    <input id="password1" name="password1" type="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                </div>
                <br>
                <div class="text-center">
                    <p>sudah punya akun? silahkan login disini! <a href="#" data-toggle="modal" data-target="#login-modal">login!</a></p>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>