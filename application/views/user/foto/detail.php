<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <!-- <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" style="height: 8vh;" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?> -->

    <div class="row ml-2 justify-content-between">
        <a href="<?= base_url('user/beranda'); ?>" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-3"><i class="fas fa-fw fa-arrow-left"></i>Kembali</a>
    </div>

 
    <div>
        <div class="card m-2" style="max-width: 900px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url($foto['lokasi_file']); ?>" class="card-img-top" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body ml-3">
                        <h2 class="card-title text-dark"><span style="font-weight: 600;"><?= $foto['username']; ?></span></h2>
                        <h4 class="card-text text-dark"><?= $foto['deskripsi_foto']; ?></h4>
                        <p class="card-text text-muted pb-2">Last Updated <?= date('d F Y', strtotime($foto['tanggal_unggah'])); ?></p>
                        <?php foreach ($komen as $komen) : ?>
                        <div class="row mb-2" style="padding-left: 13px;">
                            <div class="mr-2"><span style="font-size: 14px; font-weight: 600;"><?= $komen['username']; ?></span></div>
                            <div><small><?= date('d-m-Y', strtotime($komen['tanggal_komentar'])); ?></small></div>
                        </div>
                        <div class="row mb-4 justify-content-between">
                            <div class="col-9 text-dark" style="margin-top: -5px;"><?= $komen['isi_komentar']; ?></div>
                            <div class="col-2" style="margin-top: -30px;"><a href="<?= base_url('user/deleteKomen/' . $komen['id'].'/'.$foto['id']); ?>" onclick="return confirm('Yakin hapus komen <?= $komen['username']; ?> <?= $komen['tanggal_komentar']?>?');" class="text-decoration-none text-danger">hapus</a></div>
                        </div>
                        <hr style="margin-top: -15px" class="">
                        <?php endforeach; ?>

                        <form action="<?= base_url('user/tambahKomen/'.$foto['id']) ?>" method="post">
                        <label for="komen" class="form-label text-dark">Add a Comment:</label>
                            <div class="input-group" style="width: 515px;">
                                <input type="text" class="form-control" name="isi_komentar" placeholder="Your comment..." aria-label="komen" aria-describedby="button-addon2">
                                <input type="hidden" class="form-control" id="user" name="user_id" value="<?= $user['id']; ?>">
                                <input type="hidden" class="form-control" id="foto" name="foto_id" value="<?= $foto['id']; ?>">
                                <input type="hidden" class="form-control" id="tgl" name="tanggal_komentar" value="<?= date('Y-m-d'); ?>" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-warning" id="button-addon2"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
					<div class="pl-4 col-3 mb-3">
                            <?php if (count($isLiked) == 1 && $like != null) : ?>
                                <a href="<?= base_url('user/hapusLike/'.$isLiked[0]['id'].'/'.$foto['id']); ?>" type="submit">
                                    <i class="fas fa-heart text-danger" style="font-size: 25px;">
                                    </i>
                                </a>
                                    <span class="text-dark"><?= count($like); ?> Like</span>
                            <?php else : ?>
                                <a href="<?= base_url('user/tambahLike/'.$foto['id']); ?>" type="submit">
                                    <i class="far fa-heart text-secondary" style="font-size: 25px;">
                                    </i>
                                </a>
                                <span class="text-dark"><?= count($like); ?> Like</span>
                            <?php endif; ?>
                            </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
