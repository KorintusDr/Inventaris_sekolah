<?php
setlocale(LC_TIME, 'id_ID.UTF-8');

function formatTanggal($tanggal) {
    $formatter = new IntlDateFormatter(
        'id_ID', 
        IntlDateFormatter::LONG, 
        IntlDateFormatter::NONE, 
        'Asia/Jayapura', 
        IntlDateFormatter::GREGORIAN
    );
    return $formatter->format(new DateTime($tanggal));
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang Masuk</li>
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
                            <h3 class="card-title">Daftar Barang Masuk</h3>
                            <div class="card-tools">
                            <a href="<?= site_url('barang-masuk/export') ?>" class="btn btn-success">
                                <i class="fas fa-file-excel"></i> Export ke Excel
                            </a>
                            <a href="<?= site_url('barang-masuk/pdf') ?>" class="btn btn-danger" target="_blank">
                                <i class="fas fa-file-pdf"></i> Export ke PDF
                            </a>

                                <a href="<?= base_url('barang_masuk/tambah') ?>" class="btn btn-primary">
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
                                        <th class="text-center">Tanggal Masuk</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Ruangan</th>
                                        <th class="text-center">Merek</th>
                                        <th class="text-center">Kondisi</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($barang_masuk)): ?>
                                        <?php foreach ($barang_masuk as $key => $item): ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1 ?></td>
                                                <td><?= $item['nama_barang'] ?></td>
                                                <td><?= formatTanggal($item['tanggal_masuk']) ?></td>
                                                <td><?= $item['jumlah'] ?></td>
                                                <td><?= $item['nama_kategori'] ?></td>
                                                <td><?= $item['nama_ruangan'] ?></td>
                                                <td><?= $item['nama_merek'] ?></td>
                                                <td><?= $item['nama_kondisi'] ?></td>
                                                <td><?= $item['deskripsi'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('barang_masuk/edit/' . $item['id_barang_masuk']) ?>" class="btn btn-info btn-xs">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs" onclick="confirmDelete('<?= base_url('barang_masuk/hapus/' . $item['id_barang_masuk']) ?>'); return false;">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="10" class="text-center">Tidak ada data barang masuk.</td>
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
