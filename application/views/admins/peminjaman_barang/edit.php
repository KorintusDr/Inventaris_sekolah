<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Peminjaman Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('peminjam_barang') ?>">Data Peminjaman Barang</a></li>
                        <li class="breadcrumb-item active">Edit Peminjaman Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-info-circle"></i> Edit Data Peminjaman Barang</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('peminjam_barang/update') ?>" method="post">
                                <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman'] ?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_peminjam">Nama Peminjam:</label>
                                            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $peminjaman['nama_peminjam'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_barang">Nama Barang:</label>
                                            <select class="form-control" id="id_barang" name="id_barang" required>
                                                <option value="">-- Pilih --</option>
                                                <?php if (!empty($barang)): ?>
                                                    <?php foreach ($barang as $b): ?>
                                                        <option value="<?= $b['id_barang'] ?>" <?= $b['id_barang'] == $peminjaman['id_barang'] ? 'selected' : '' ?>><?= $b['nama_barang'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">Tidak ada data barang</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori:</label>
                                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                                <option value="">-- Pilih --</option>
                                                <?php if (!empty($kategori)): ?>
                                                    <?php foreach ($kategori as $k): ?>
                                                        <option value="<?= $k['id_kategori'] ?>" <?= $k['id_kategori'] == $peminjaman['id_kategori'] ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">Tidak ada data kategori</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_ruangan">Ruangan:</label>
                                            <select class="form-control" id="id_ruangan" name="id_ruangan" required>
                                                <option value="">-- Pilih --</option>
                                                <?php if (!empty($ruangan)): ?>
                                                    <?php foreach ($ruangan as $r): ?>
                                                        <option value="<?= $r['id_ruangan'] ?>" <?= $r['id_ruangan'] == $peminjaman['id_ruangan'] ? 'selected' : '' ?>><?= $r['nama_ruangan'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">Tidak ada data ruangan</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah:</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $peminjaman['jumlah'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_merek">Merek:</label>
                                            <select class="form-control" id="id_merek" name="id_merek" required>
                                                <option value="">-- Pilih --</option>
                                                <?php if (!empty($merek)): ?>
                                                    <?php foreach ($merek as $m): ?>
                                                        <option value="<?= $m['id_merek'] ?>" <?= $m['id_merek'] == $peminjaman['id_merek'] ? 'selected' : '' ?>><?= $m['nama_merek'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">Tidak ada data merek</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kondisi">Kondisi:</label>
                                            <select class="form-control" id="id_kondisi" name="id_kondisi" required>
                                                <option value="">-- Pilih --</option>
                                                <?php if (!empty($kondisi)): ?>
                                                    <?php foreach ($kondisi as $k): ?>
                                                        <option value="<?= $k['id_kondisi'] ?>" <?= $k['id_kondisi'] == $peminjaman['id_kondisi'] ? 'selected' : '' ?>><?= $k['nama_kondisi'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="">Tidak ada data kondisi</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_kembali">Tanggal Kembali:</label>
                                    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= $peminjaman['tanggal_kembali'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan"><?= $peminjaman['keterangan'] ?></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="<?= base_url('peminjam_barang') ?>" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
