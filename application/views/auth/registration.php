<!-- Begin Page Content -->
<div class="container">

    <div class="card border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg">
                    <div class="pt-4 pb-4 pl-5 pr-5">
                        <div class="text-center">
                            <h1 class="h4 mb-4 text-dark">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" placeholder="Full name">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" placeholder="Username">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Email Address">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>" placeholder="Address">
                                <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="card-link" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->

</div>
<!-- End of Main Content -->