<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Ruangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Ruangan</li>
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
                            <h3 class="card-title">Daftar Ruangan</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahRuangan">
                                    <i class="fas fa-plus"></i> Tambah Ruangan
                                </a>
                                <a href="<?= base_url('ruangan/backup_database') ?>" class="btn btn-info">
                                    <i class="fas fa-database"></i> Backup Data Tabel
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-danger">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Ruangan</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($ruangan)): ?>
                                        <?php foreach ($ruangan as $key => $item): ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1 ?></td>
                                                <td><?= $item['nama_ruangan'] ?></td>
                                                <td><?= $item['deskripsi'] ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEditRuangan<?= $item['id_ruangan'] ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs" onclick="confirmDelete('<?= base_url('ruangan/hapus/' . $item['id_ruangan']) ?>'); return false;">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit Ruangan -->
                                            <div class="modal fade" id="modalEditRuangan<?= $item['id_ruangan'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Ruangan</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('ruangan/update') ?>" method="post">
                                                                <input type="hidden" name="id_ruangan" value="<?= $item['id_ruangan'] ?>">
                                                                <div class="form-group">
                                                                    <label for="edit_nama_ruangan">Nama Ruangan:</label>
                                                                    <input type="text" class="form-control" id="edit_nama_ruangan" name="nama_ruangan" value="<?= $item['nama_ruangan'] ?>" required>
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
                                            <td colspan="4" class="text-center">Tidak ada data ruangan.</td>
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

<!-- Modal Tambah Ruangan -->
<div class="modal fade" id="modalTambahRuangan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Ruangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('ruangan/tambah') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_ruangan">Nama Ruangan:</label>
                        <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Ruangan</button>
                </form>
            </div>
        </div>
    </div>
</div>
