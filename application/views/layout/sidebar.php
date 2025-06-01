<?php
    $current_page = basename($_SERVER['PHP_SELF']);
    $role = $this->session->userdata('role'); 
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?= base_url('backend/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Edu Stock Manager</span>
    </a>

    <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
            <?php 
                //$profileImage = (null !== $user && !empty($user->gambar)) ? base_url('uploads/' . $user->gambar) : base_url('backend/dist/img/user2-160x160.jpg');
            ?>
            <img src="<?= $profileImage; ?>" class="img-circle elevation-2" alt="User Image">
        </div> -->
    <div class="info">
        <a href="<?= base_url('profile'); ?>" class="d-block"><h2><?= $this->session->userdata('username') ? $this->session->userdata('username') : 'Guest'; ?></h2></a>
    </div>
    </div>

        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Menu Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= $current_page == 'dashboard.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <?php if ($role == 'admin'): ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('merek'); ?>" class="nav-link <?= $current_page == 'merek.php' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-registered"></i>
                                    <p>Merek</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('kategori'); ?>" class="nav-link <?= $current_page == 'kategori.php' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-tags"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('ruangan'); ?>" class="nav-link <?= $current_page == 'ruangan.php' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>Ruangan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('kondisi'); ?>" class="nav-link <?= $current_page == 'kondisi.php' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>Kondisi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?= in_array($current_page, ['barang.php', 'barang_tambah.php']) ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Stock Barang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('barang'); ?>" class="nav-link <?= $current_page == 'barang.php' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Data Stock Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('barang/tambah'); ?>" class="nav-link <?= $current_page == 'barang_tambah.php' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Tambah Barang</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview <?= in_array($current_page, ['barang_masuk.php', 'barang_masuk_tambah.php']) ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Barang Masuk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('barang_masuk'); ?>" class="nav-link <?= $current_page == 'barang_masuk.php' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Data Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('barang_masuk/tambah'); ?>" class="nav-link <?= $current_page == 'barang_masuk_tambah.php' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Tambah Barang Masuk</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview <?= in_array($current_page, ['barang_keluar.php', 'barang_keluar_tambah.php']) ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Barang Keluar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('barang_keluar'); ?>" class="nav-link <?= $current_page == 'barang_keluar.php' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Data Barang Keluar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('barang_keluar/tambah'); ?>" class="nav-link <?= $current_page == 'barang_keluar_tambah.php' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Tambah Barang Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview <?= in_array($current_page, ['peminjam_barang.php', 'peminjam_barang_tambah.php']) ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Peminjaman Barang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('peminjam_barang'); ?>" class="nav-link <?= $current_page == 'peminjam_barang.php' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Data Peminjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('peminjam_barang/tambah'); ?>" class="nav-link <?= $current_page == 'peminjam_barang_tambah.php' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Tambah Peminjaman</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php elseif ($role == 'kepsek'): ?>
                    <li class="nav-item">
                        <a href="<?= base_url('barang'); ?>" class="nav-link <?= $current_page == 'barang.php' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Stock Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('barang_masuk'); ?>" class="nav-link <?= $current_page == 'barang_masuk.php' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-inbox"></i>
                            <p>Barang Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('barang_keluar'); ?>" class="nav-link <?= $current_page == 'barang_keluar.php' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>Barang Keluar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('peminjam_barang'); ?>" class="nav-link <?= $current_page == 'peminjam_barang.php' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>Peminjaman Barang</p>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
