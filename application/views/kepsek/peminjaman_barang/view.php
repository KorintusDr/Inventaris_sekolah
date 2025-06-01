<?php
function formatTanggalIndo($tanggal) {
    $bulanIndo = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    ];

    $tanggalFormat = date('d F Y', strtotime($tanggal));

    return str_replace(array_keys($bulanIndo), array_values($bulanIndo), $tanggalFormat);
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peminjaman Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Data Peminjaman Barang</li>
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
                            <h3 class="card-title">Daftar Peminjaman Barang</h3>
                            <div class="card-tools">
                                <a href="<?= site_url('peminjam_barang/export') ?>" class="btn btn-success">
                                    <i class="fas fa-file-excel"></i> Export ke Excel
                                </a>
                                <a href="<?= site_url('peminjam_barang/pdf') ?>" class="btn btn-danger" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Export ke PDF
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-danger">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Peminjam</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Tanggal Pinjam</th>
                                        <th class="text-center">Tanggal Kembali</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($peminjaman_barang)): ?>
                                        <?php foreach ($peminjaman_barang as $key => $item): ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1 ?></td>
                                                <td><?= $item['nama_peminjam'] ?></td>
                                                <td><?= $item['nama_barang'] ?></td>
                                                <td><?= formatTanggalIndo($item['tanggal_pinjam']) ?></td>
                                                <td><?= formatTanggalIndo($item['tanggal_kembali']) ?></td>
                                                <td class="text-center"><?= $item['status'] ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-detail-<?= $item['id_peminjaman'] ?>">
                                                        <i class="fas fa-info-circle"></i> Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data peminjaman barang.</td>
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

<?php foreach ($peminjaman_barang as $item): ?>
    <div class="modal fade" id="modal-detail-<?= $item['id_peminjaman'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Peminjaman Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Nama Peminjam</div>
                        <div class="col-md-8">: <?= $item['nama_peminjam'] ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Nama Barang</div>
                        <div class="col-md-8">: <?= $item['nama_barang'] ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Tanggal Pinjam</div>
                        <div class="col-md-8">: <?= formatTanggalIndo($item['tanggal_pinjam']) ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Tanggal Kembali</div>
                        <div class="col-md-8">: <?= formatTanggalIndo($item['tanggal_kembali']) ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Kategori</div>
                        <div class="col-md-8">: <?= $item['nama_kategori'] ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Ruangan</div>
                        <div class="col-md-8">: <?= $item['nama_ruangan'] ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Merek</div>
                        <div class="col-md-8">: <?= $item['nama_merek'] ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Kondisi</div>
                        <div class="col-md-8">: <?= $item['nama_kondisi'] ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Keterangan</div>
                        <div class="col-md-8">: <?= $item['keterangan'] ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Status</div>
                        <div class="col-md-8">: <?= $item['status'] ?></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
