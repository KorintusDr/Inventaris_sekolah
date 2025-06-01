
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
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
                            <h3 class="card-title">Daftar Barang</h3>
                            <div class="card-tools">
                            <a href="<?= site_url('barang/export') ?>" class="btn btn-success">
                                <i class="fas fa-file-excel"></i> Export ke Excel
                            </a>
                            <a href="<?= site_url('barang/pdf') ?>" class="btn btn-danger" target="_blank">
                                <i class="fas fa-file-pdf"></i> Export ke PDF
                            </a>
                                <a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-danger">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Merek</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Ruangan</th>
                                        <th class="text-center">Kondisi</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($barang)): ?>
                                        <?php foreach ($barang as $key => $item): ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1 ?></td>
                                                <td><?= $item['nama_barang'] ?></td>
                                                <td><?= $item['nama_merek'] ?></td>
                                                <td><?= $item['nama_kategori'] ?></td>
                                                <td><?= $item['nama_ruangan'] ?></td>
                                                <td><?= $item['nama_kondisi'] ?></td>
                                                <td><?= $item['jumlah'] ?></td>
                                                <td><?= $item['deskripsi'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('barang/edit/' . $item['id_barang']) ?>" class="btn btn-info btn-xs">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs" onclick="confirmDelete('<?= base_url('barang/hapus/' . $item['id_barang']) ?>'); return false;">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data barang.</td>
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
