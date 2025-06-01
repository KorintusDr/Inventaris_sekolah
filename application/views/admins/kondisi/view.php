<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kondisi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Kondisi</li>
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
                            <h3 class="card-title">Daftar Kondisi</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKondisi">
                                    <i class="fas fa-plus"></i> Tambah Kondisi
                                </a>
                                <a href="<?= base_url('kondisi/backup_database') ?>" class="btn btn-info">
                                    <i class="fas fa-database"></i> Backup Data Tabel
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-danger">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Kondisi</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($kondisi)): ?>
                                        <?php foreach ($kondisi as $key => $item): ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1 ?></td>
                                                <td><?= $item['nama_kondisi'] ?></td>
                                                <td><?= $item['deskripsi'] ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEditKondisi<?= $item['id_kondisi'] ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs" onclick="confirmDelete('<?= base_url('kondisi/hapus/' . $item['id_kondisi']) ?>'); return false;">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit Kondisi -->
                                            <div class="modal fade" id="modalEditKondisi<?= $item['id_kondisi'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Kondisi</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('kondisi/update') ?>" method="post">
                                                                <input type="hidden" name="id_kondisi" value="<?= $item['id_kondisi'] ?>">
                                                                <div class="form-group">
                                                                    <label for="edit_nama_kondisi">Nama Kondisi:</label>
                                                                    <input type="text" class="form-control" id="edit_nama_kondisi" name="nama_kondisi" value="<?= $item['nama_kondisi'] ?>" required>
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
                                            <td colspan="4" class="text-center">Tidak ada data kondisi.</td>
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

<!-- Modal Tambah Kondisi -->
<div class="modal fade" id="modalTambahKondisi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kondisi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kondisi/tambah') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_kondisi">Nama Kondisi:</label>
                        <input type="text" class="form-control" id="nama_kondisi" name="nama_kondisi" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kondisi</button>
                </form>
            </div>
        </div>
    </div>
</div>
