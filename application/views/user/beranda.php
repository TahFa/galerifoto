    <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Selamat Datang <?= $user['username']; ?> di <?= $title; ?></h1>

<!-- <div class="row">
    <div class="col-lg-6">
        <?= $this->session->flashdata('message'); ?>
    </div>
</div> -->

<div class="row d-flex-wrap">
    <?php foreach ($foto as $f) : ?>
    <a href="<?= base_url('user/detailFoto/' . $f['foto_id']); ?>" class="text-decoration-none m-2">
    <div class="card" style="width: 20rem; height: 30rem;">
        <p class="text-dark p-1"><i class="fas fa-user-circle fa-2x"></i> <span class="font-weight-bold" style="vertical-align:super;"><?= $f['username']; ?></span></p>
        <img src="<?= base_url($f['lokasi_file']); ?>" class="card-img-thumbnail" alt="...">
        <div class="card-body row justify-content-between">
            <p class="text-dark h4"><?= $f['judul_foto']; ?></p>
            <p class="card-text small text-secondary align-content-end">Last update <?= date('d-m-Y', strtotime($f['tanggal_unggah'])); ?></p>          
        </div>
    </div>
    </a>
    <?php endforeach; ?>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->