<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>">Data Barang</a></li>
                        <li class="breadcrumb-item active">Edit Barang</li>
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
                            <h3 class="card-title"><i class="fas fa-info-circle"></i> Isi Formulir untuk Mengedit Data Barang</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('barang/update') ?>" method="post">
                                <input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang:</label>
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori:</label>
                                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($kategori as $k): ?>
                                                    <option value="<?= $k['id_kategori'] ?>" <?= $k['id_kategori'] == $barang['id_kategori'] ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_ruangan">Ruangan:</label>
                                            <select class="form-control" id="id_ruangan" name="id_ruangan" required>
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($ruangan as $r): ?>
                                                    <option value="<?= $r['id_ruangan'] ?>" <?= $r['id_ruangan'] == $barang['id_ruangan'] ? 'selected' : '' ?>><?= $r['nama_ruangan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah:</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_merek">Merek:</label>
                                            <select class="form-control" id="id_merek" name="id_merek" required>
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($merek as $m): ?>
                                                    <option value="<?= $m['id_merek'] ?>" <?= $m['id_merek'] == $barang['id_merek'] ? 'selected' : '' ?>><?= $m['nama_merek'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kondisi">Kondisi:</label>
                                            <select class="form-control" id="id_kondisi" name="id_kondisi" required>
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($kondisi as $k): ?>
                                                    <option value="<?= $k['id_kondisi'] ?>" <?= $k['id_kondisi'] == $barang['id_kondisi'] ? 'selected' : '' ?>><?= $k['nama_kondisi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi:</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"><?= $barang['deskripsi'] ?></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-warning">
                                    <i class="fas fa-undo"></i> Kosongkan
                                </button>
                                <a href="<?= base_url('barang') ?>" class="btn btn-secondary">
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
