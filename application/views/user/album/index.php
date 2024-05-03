<style>
    .tabel>tbody>tr>* {
        vertical-align: middle;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="d-sm-flex align-items-center mb-2">
        <!-- <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1> -->
        <a href="" data-toggle="modal" data-target="#newAlbumModal" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-4"><i class="fas fa-fw fa-plus"></i> Add Album</a>
    </div>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered tabel" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama_album</th>
                                    <th>Deskripsi</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody align="center" data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                                <?php $no = 1; ?>
                                <?php foreach ($album as $a) : ?>
                                    <?php if($a['user_id'] == $user['id']) : ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $a['nama_album']; ?></td>
                                        <td class="text-left"><?= $a['deskripsi']; ?></td>
                                        <td><?= $a['tanggal_buat']; ?></td>
                                        <td>
                                        <input type="hidden" data="" name="id" id="id" value="<?= $a['id'] ?>">
                                            <a href="<?= base_url(); ?>user/album/<?= $a['id']; ?>" class="btn btn-primary">See more</a>
                                            <a href="" data-toggle="modal" data-target="#changeAlbumModal<?= $a['id'] ?>" class="btn btn-warning lg-1"><i class="far fa-fw fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>user/deleteAlbum/<?= $a['id']; ?>" onclick="return confirm('Yakin hapus data <?= $a['nama_album']; ?>?');" class="btn btn-danger"><i class="far fa-fw fa-trash-alt"></i></a>
                                        </td>   
                                    </tr>
                                    <?php endif ; ?>
                                    <?php $no++; ?>
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

<!-- Modal -->

<div class="modal fade" id="newAlbumModal" tabindex="-1" aria-labelledby="newAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAlbumModalLabel">Add New Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/album'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama_album" placeholder="Masukkan Nama Album" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="deskripsi" placeholder="Masukkan Deskripsi" required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tgl" name="tanggal_buat" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user" name="user_id" value="<?= $user['id']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $no = 1; ?>
<?php foreach ($album as $u) : $no++; ?>
    <div class="modal fade" id="changeAlbumModal<?= $u['id'] ?>" tabindex="-1" aria-labelledby="changeAlbumModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeAlbumModalLabel">Change Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/editAlbum/' . $u['id']); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $u['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nis" name="nama_album" value="<?= $u['nama_album'];?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="deskripsi" value="<?= $u['deskripsi'];?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>