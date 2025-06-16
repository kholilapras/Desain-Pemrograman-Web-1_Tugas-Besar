<?php
include "../config/koneksi.php";

// Table-driven array
$routes = [
    'login' => 'action/login.php',
    'logout' => 'action/logout.php',
    'register' => 'action/register.php',
    'tambah-carousel' => 'action/cms/tambah-carousel.php',
    'ubah-carousel' => 'action/cms/ubah-carousel.php',
    'hapus-carousel' => 'action/cms/hapus-carousel.php',
    'info-web' => 'action/cms/info-web.php',
    'tambah-menu' => 'action/cms/tambah-menu.php',
    'ubah-menu' => 'action/cms/ubah-menu.php',
    'hapus-menu' => 'action/cms/hapus-menu.php',
    'waktu-operasional' => 'action/cms/waktu-operasional.php',
    'tambah-banner-teks' => 'action/cms/tambah-banner-teks.php',
    'hapus-banner-teks' => 'action/cms/hapus-banner-teks.php',
    'hapus-pesan' => 'action/cms/hapus-pesan.php',
    'tambah-gallery' => 'action/cms/tambah-gallery.php',
    'hapus-gallery' => 'action/cms/hapus-gallery.php',
    'hapus-akun' => 'action/cms/hapus-akun.php',
];

$action = $_GET['action'] ?? '';

if (isset($routes[$action])) {
    include $routes[$action];
} else {
    echo "Action tidak ditemukan atau tidak valid.";
}
