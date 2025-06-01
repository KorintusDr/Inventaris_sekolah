-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 07:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_merek`, `id_kategori`, `id_ruangan`, `id_kondisi`, `nama_barang`, `jumlah`, `deskripsi`, `created_at`) VALUES
(1, 1, 1, 3, 1, 'Anunya', 12, 'Laptop Khusus Praktk', '2024-09-04 03:48:27'),
(3, 2, 1, 3, 1, 'Laptop', 55, 'ty', '2024-09-14 08:44:07'),
(4, 2, 2, 1, 2, 'Bola Voli', 66, 'tt', '2024-09-14 08:46:29'),
(5, 2, 1, 1, 4, 'Anunya', 5, 'tut', '2024-09-15 10:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `nama_barang`, `id_kategori`, `id_ruangan`, `id_merek`, `id_kondisi`, `jumlah`, `deskripsi`, `tanggal_keluar`) VALUES
(1, 'Anunya', 1, 5, 3, 1, 4, 'tut', '2024-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `nama_barang`, `id_kategori`, `id_ruangan`, `jumlah`, `id_merek`, `id_kondisi`, `deskripsi`, `tanggal_masuk`) VALUES
(1, 'Rumah Adat Toraja', 2, 5, 44, 9, 3, 'tutu', '2024-09-14 06:50:09'),
(2, 'Kipas Angin', 1, 4, 5, 5, 1, 'barang baru', '2024-09-14 06:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'Elektronik', 'Barang-barang elektronik seperti komputer,  printer, dll.'),
(2, 'Furniture', 'Barang-barang furniture seperti meja, kursi, lemari, dll.');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`, `deskripsi`) VALUES
(1, 'Baik', 'Barang dalam kondisi baik, tidak ada kerusakan atau cacat.'),
(2, 'Rusak Ringan', 'Barang mengalami kerusakan kecil namun masih bisa digunakan.'),
(3, 'Rusak Berat', 'Barang mengalami kerusakan parah dan tidak dapat digunakan.'),
(4, 'Baru', 'Barang baru dan belum pernah digunakan.'),
(5, 'Bekas', 'Barang sudah pernah digunakan sebelumnya.');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(11) NOT NULL,
  `nama_merek` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`, `deskripsi`) VALUES
(1, 'Acer', 'Merek komputer dan laptop yang sering digunakan di laboratorium sekolah.'),
(2, 'Logitech', 'Merek mouse dan keyboard yang digunakan di banyak sekolah.'),
(3, 'HP', 'Merek printer yang biasa digunakan di ruang kantor sekolah.'),
(4, 'Epson', 'Merek proyektor dan printer yang sering digunakan dalam presentasi dan administrasi sekolah.'),
(5, 'Casio', 'Merek kalkulator yang digunakan oleh siswa dalam pembelajaran matematika.'),
(6, 'Sharp', 'Merek kalkulator dan perangkat elektronik lainnya yang digunakan di sekolah.'),
(7, 'Faber-Castell', 'Merek alat tulis seperti pensil, penghapus, dan penggaris yang umum digunakan oleh siswa.'),
(8, 'Samsung', 'Merek televisi dan monitor yang digunakan di ruang kelas atau laboratorium komputer.'),
(9, 'Dell', 'Merek komputer dan monitor yang digunakan untuk keperluan administrasi dan pembelajaran di sekolah.'),
(10, 'Brother', 'Merek printer dan mesin fotokopi yang sering digunakan untuk kebutuhan cetak di sekolah.');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_barang`
--

CREATE TABLE `peminjaman_barang` (
  `id_peminjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('Dipinjam','Kembali','Terlambat') DEFAULT 'Dipinjam',
  `keterangan` text DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_barang`
--

INSERT INTO `peminjaman_barang` (`id_peminjaman`, `id_barang`, `nama_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah`, `status`, `keterangan`, `id_kategori`, `id_merek`, `id_kondisi`, `id_ruangan`) VALUES
(3, 1, 'Korintuss', '2024-09-10', '2024-09-10', 5, 'Terlambat', 'tutd', 1, 3, 1, 2),
(5, 1, 'Alma', '2024-11-11', '2024-12-19', 4, 'Kembali', 'tut', 1, 3, 2, 4),
(6, 3, 'Yonki', '2024-09-14', '2024-10-17', 2, 'Kembali', 'rusak eh', 1, 5, 1, 2),
(7, 4, 'Erson', '2024-09-21', '2024-11-14', 1, 'Dipinjam', 'er', 2, 1, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `deskripsi`) VALUES
(1, 'Ruang Kelas A', 'Ruang kelas untuk mata pelajaran umum'),
(2, 'Ruang Kelas B', 'Ruang kelas untuk mata pelajaran sains'),
(3, 'Ruang Laboratorium', 'Laboratorium untuk praktikum sains'),
(4, 'Ruang Perpustakaan', 'Tempat untuk membaca dan meminjam buku'),
(5, 'Ruang Administrasi', 'Ruang untuk kegiatan administrasi dan pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','kepsek') NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `nama_lengkap`, `gambar`) VALUES
(1, 'KOR1502c246', '$2y$10$FGNJkkPAY4DUMzY82njwkucgAfr17i7OrgNFakcqcFPDnE6m/JbKC', 'admin', 'Malas Coding', 'avatar4.png'),
(2, 'ERS8187f614', '$2y$10$wox1BmEElXgfBtrU8SLu7uJA9aofU1v.v81jFGLyEm85rFN2..cWK', 'kepsek', 'Erson Kipka', 'avatar2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_merek` (`id_merek`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_kondisi` (`id_kondisi`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_merek` (`id_merek`),
  ADD KEY `id_kondisi` (`id_kondisi`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_merek` (`id_merek`),
  ADD KEY `id_kondisi` (`id_kondisi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_merek` (`id_merek`),
  ADD KEY `id_kondisi` (`id_kondisi`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `barang_ibfk_4` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi` (`id_kondisi`);

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_3` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_4` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi` (`id_kondisi`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD CONSTRAINT `peminjaman_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `peminjaman_barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `peminjaman_barang_ibfk_3` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`),
  ADD CONSTRAINT `peminjaman_barang_ibfk_4` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi` (`id_kondisi`),
  ADD CONSTRAINT `peminjaman_barang_ibfk_5` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
