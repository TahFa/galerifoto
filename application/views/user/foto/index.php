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

            <a href="" data-toggle="modal" data-target="#newFotoModal" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-4"><i class="fas fa-fw fa-plus"></i> Add Photo</a>

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
                                    <th>Album</th>
                                    <th>Action</th>
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
                                        <td class="text-left"><?= $f['nama_album']; ?></td>
                                        <td width="100px">
                                        <input type="hidden" data="" name="id" id="id" value="<?= $f['foto_id'] ?>">
                                            <a href="" data-toggle="modal" data-target="#changeFotoModal<?= $f['foto_id'] ?>" class="text-warning lg-1"><i class="far fa-fw fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>user/deleteFoto/<?= $f['foto_id']; ?>" onclick="return confirm('Yakin hapus Foto <?= $u['judul_foto']; ?>?');" class="text-danger"><i class="far fa-fw fa-trash-alt"></i></a>
                                        </td>   
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

<!-- Modal -->

<div class="modal fade" id="newFotoModal" tabindex="-1" aria-labelledby="newFotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newFotoModalLabel">Add New Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/Foto'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul" name="judul_foto" placeholder="Ketik Judul Foto" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi_foto" placeholder="Masukkan Deskripsi Foto" required>
                    </div>
                    <div class="custom-file form-group">
                        <input type="file" class="custom-file-input" id="lokasi_file" name="userfile" placeholder="foto">
                        <label class="custom-file-label" for="lokasi_file"></label>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="album" name="album_id" value="<?= $album ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="tgl" name="tanggal_unggah" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user" name="user_id" value="<?= $user['id']; ?>" required>
                    </div>
                    <div class="form-group">
                        <select name="album_id" id="album" class="form-control">
                            <?php foreach ($album as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['nama_album']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
<?php foreach ($foto as $f) : $no++; ?>
    <div class="modal fade" id="changeFotoModal<?= $f['foto_id'] ?>" tabindex="-1" aria-labelledby="changeFotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeFotoModalLabel">Change Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/editFoto/' . $f['foto_id']); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $f['foto_id']; ?>">
                    <div class="modal-body">    
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul" name="judul_foto" value="<?= $f['judul_foto'];?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="deskripsi_foto" value="<?= $f['deskripsi_foto'];?>" required>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <img src="<?= base_url($f['lokasi_file']) ; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="userfile" placeholder="Ganti foto">
                                    <input type="hidden" name="before_path" value="<?= $f['lokasi_file'] ?>">
                                    <label class="custom-file-label" for="image"></label>
                                    <p class="small ml-2">Biarkan jika tidak diubah</p>
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                            <select name="mapel_id" id="mapel_id" class="form-control">
                            <?php foreach ($album as $m) : ?>
                                <?php if($f['mapel_id'] == $m['id']) : ?>
                                    <option value="<?= $m['id']; ?>" selected><?= $m['nama_album']; ?></option>
                                <?php else:?>
                                    <option value="<?= $m['id']; ?>"><?= $m['nama_album']; ?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                            </select>
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