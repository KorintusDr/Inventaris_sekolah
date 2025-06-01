<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Kategori</li>
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
                            <h3 class="card-title">Daftar Kategori</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKategori">
                                    <i class="fas fa-plus"></i> Tambah Kategori
                                </a>
                                <a href="<?= base_url('kategori/backup_database') ?>" class="btn btn-info">
                                    <i class="fas fa-database"></i> Backup Data Tabel
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-danger">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($kategori)): ?>
                                        <?php foreach ($kategori as $key => $item): ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1 ?></td>
                                                <td><?= $item['nama_kategori'] ?></td>
                                                <td><?= $item['deskripsi'] ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEditKategori<?= $item['id_kategori'] ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs" onclick="confirmDelete('<?= base_url('kategori/hapus/' . $item['id_kategori']) ?>'); return false;">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>

                                                </td>
                                            </tr>
 
                                            <!-- Modal Edit Kategori -->
                                            <div class="modal fade" id="modalEditKategori<?= $item['id_kategori'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Kategori</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('kategori/update') ?>" method="post">
                                                                <input type="hidden" name="id_kategori" value="<?= $item['id_kategori'] ?>">
                                                                <div class="form-group">
                                                                    <label for="edit_nama_kategori">Nama Kategori:</label>
                                                                    <input type="text" class="form-control" id="edit_nama_kategori" name="nama_kategori" value="<?= $item['nama_kategori'] ?>" required>
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
                                            <td colspan="4" class="text-center">Tidak ada data kategori.</td>
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

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="modalTambahKategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kategori/tambah') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori:</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </form>
            </div>
        </div>
    </div>
</div>
