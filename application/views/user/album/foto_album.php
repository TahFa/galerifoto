<style>
    .tabel>tbody>tr>* {
        vertical-align: middle;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> -->

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

        <div class="row ml-1 mr-1 justify-content-between">
            <a href="<?= base_url('user/album'); ?>" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-3"><i class="fas fa-fw fa-arrow-left"></i>Kembali</a>
        </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered tabel" id="dataTable" width="100%">
                            <thead class="text-center thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Judul Foto</th>
                                    <th>Deskripsi Foto</th>
                                    <th>Posted At</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>

                            <tbody align="center">
                                <?php $no = 1; ?>
                                <?php foreach ($foto as $f) : ?>
                                <?php if($user['id'] == $f['user_id']) : ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $f['judul_foto']; ?></td>
                                        <td class="text-left"><?= $f['deskripsi_foto']; ?></td>
                                        <td><?= date('d F Y', strtotime($f['tanggal_unggah'])); ?></td>
                                        <td><img src="<?= base_url($f['lokasi_file']) ; ?>" alt="" width="150px"></td> 
                                    </tr>
                                    <?php $no++; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
