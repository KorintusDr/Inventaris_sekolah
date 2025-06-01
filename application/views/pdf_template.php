<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman Barang</title>
    <style>
        @media print {
            @page {
                size: landscape;
                margin: 20mm;
            }
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px; 
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 10px; 
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px; 
            text-align: left;
            word-wrap: break-word; 
            overflow: hidden;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-center {
            text-align: center;
        }
        .font-weight-bold {
            font-weight: bold;
        }
        .column-header {
            text-align: center;
            white-space: nowrap; 
        }
        td {
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis; 
        }
    </style>
</head>
<body>
    <h1>Daftar Peminjaman Barang</h1>
    <table>
        <thead>
            <tr>
                <th class="column-header">No.</th>
                <th class="column-header">Nama Peminjam</th>
                <th class="column-header">Nama Barang</th>
                <th class="column-header">Tanggal Peminjaman</th>
                <th class="column-header">Tanggal Pengembalian</th>
                <th class="column-header">Kategori</th>
                <th class="column-header">Ruangan</th>
                <th class="column-header">Merek</th>
                <th class="column-header">Kondisi</th>
                <th class="column-header">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($peminjaman_barang as $item): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= htmlspecialchars($item['nama_peminjam'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($item['nama_barang'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= date('d-m-Y', strtotime($item['tanggal_pinjam'])) ?></td>
                    <td><?= date('d-m-Y', strtotime($item['tanggal_kembali'])) ?></td>
                    <td><?= htmlspecialchars($item['nama_kategori'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($item['nama_ruangan'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($item['nama_merek'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($item['nama_kondisi'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($item['keterangan'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
