# Sistem Inventaris Sekolah

Sistem Inventaris Sekolah adalah aplikasi berbasis web yang digunakan untuk mencatat, mengelola, dan memantau data inventaris yang dimiliki oleh sekolah, seperti peralatan laboratorium, perangkat komputer, mebel, dan lainnya.

## Fitur Utama

- ✅ Manajemen data barang/inventaris
- ✅ Kategori dan jenis barang
- ✅ Pencatatan lokasi barang
- ✅ Mutasi/pemindahan barang antar ruangan
- ✅ Peminjaman dan pengembalian barang
- ✅ Laporan stok barang dan riwayat aktivitas
- ✅ Hak akses pengguna (Admin, Petugas, Guru)

## Teknologi yang Digunakan

- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP (CodeIgniter / Laravel)
- **Database:** MySQL
- **Tools:** Git, XAMPP/Laragon

## Instalasi

1. Clone repository:
   ```bash
   git clone https://github.com/username/inventaris-sekolah.git
   ```
2. Pindahkan folder ke direktori `htdocs` (jika menggunakan XAMPP).
3. Buat database di phpMyAdmin, lalu import file `database.sql`.
4. Ubah konfigurasi koneksi database di file:
   - `application/config/database.php` (untuk CodeIgniter)
5. Jalankan aplikasi di browser:
   ```
   http://localhost/inventaris-sekolah/
   ```

## Struktur Folder

```
/backend         -> File dan logika backend (PHP)
/frontend        -> Tampilan antarmuka
/assets          -> Gambar, CSS, JS, plugin
/database        -> File SQL database
```

## Hak Akses Pengguna

| Role     | Akses                                  |
|----------|----------------------------------------|
| Admin    | Semua fitur + manajemen user           |
| Petugas  | Kelola data barang & peminjaman        |
| Guru     | Melihat data dan mengajukan peminjaman |

## Kontribusi

Pull request dan saran pengembangan sangat terbuka! Silakan fork repo ini terlebih dahulu sebelum melakukan kontribusi.

## Lisensi

Proyek ini dilisensikan di bawah MIT License. Silakan gunakan dan kembangkan secara bebas.

---

✉️ Untuk pertanyaan atau support, silakan hubungi: [youremail@example.com](mailto:youremail@example.com)
