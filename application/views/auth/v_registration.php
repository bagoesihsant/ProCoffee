<p class="login-box-msg">Create An Account!</p>
<form class="user" action="<?= base_url('auth/registration'); ?>" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?= set_value('email'); ?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?= set_value('username'); ?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user-tag"></span>
            </div>
        </div>
    </div>
    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password1" id="password1">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Retype password" name="password2" id="password2">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- /.col -->
        <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- /.col -->
    </div>
</form>
<br>
<a href="<?= base_url('auth'); ?>" class="text-center">I already have a membership</a>