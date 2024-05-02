<!-- Begin Page Content -->
<div class="container">
    
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center my-5">
        <div class="card shadow-lg" style="width: 22rem;">
            <div class="card-body">
                <h2 class="card-title text-center mb-5 text-dark">Login</h2>
                <div>
                    <form action="<?= base_url('auth') ?>" method="post">
                    <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <div class="input-group pt-2">
                            <input type="text" class="form-control" name="username" placeholder="Enter Username" value="<?php echo set_value('username'); ?>">
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"  style="width: 100%;">Login</button>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="text-center">
                    <a href="<?= base_url('auth/registration')?>" class="card-link">Create account!</a>
                    <br>
                    <a href="<?= base_url('user/beranda')?>" class="card-link"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->

</div>
<!-- End of Main Content -->