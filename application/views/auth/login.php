<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<body>

<?php if ($this->session->flashdata('message')) : ?>
    <div class="alert alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>

<div class="row justify-content-center my-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h2 class="card-title text-center mb-5">Login</h2>
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
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>