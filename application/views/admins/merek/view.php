<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Merek</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Merek</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Merek</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahMerek">
                                    <i class="fas fa-plus"></i> Tambah Merek
                                </a>
                                <a href="<?= base_url('merek/backup_database') ?>" class="btn btn-info">
                                    <i class="fas fa-database"></i> Backup Data Tabel
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-danger">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Merek</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($merek)): ?>
                                        <?php foreach ($merek as $key => $item): ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1 ?></td>
                                                <td><?= $item['nama_merek'] ?></td>
                                                <td><?= $item['deskripsi'] ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEditMerek<?= $item['id_merek'] ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs" onclick="confirmDelete('<?= base_url('merek/hapus/' . $item['id_merek']) ?>'); return false;">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>

                                                </td>
                                            </tr>

                                            <!-- Modal Edit Merek -->
                                            <div class="modal fade" id="modalEditMerek<?= $item['id_merek'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Merek</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('merek/update') ?>" method="post">
                                                                <input type="hidden" name="id_merek" value="<?= $item['id_merek'] ?>">
                                                                <div class="form-group">
                                                                    <label for="edit_nama_merek">Nama Merek:</label>
                                                                    <input type="text" class="form-control" id="edit_nama_merek" name="nama_merek" value="<?= $item['nama_merek'] ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="edit_deskripsi">Deskripsi:</label>
                                                                    <input type="text" class="form-control" id="edit_deskripsi" name="deskripsi" value="<?= $item['deskripsi'] ?>" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data merek.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah Merek -->
<div class="modal fade" id="modalTambahMerek">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Merek</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('merek/tambah') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_merek">Nama Merek:</label>
                        <input type="text" class="form-control" id="nama_merek" name="nama_merek" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Merek</button>
                </form>
            </div>
        </div>
    </div>
</div>
