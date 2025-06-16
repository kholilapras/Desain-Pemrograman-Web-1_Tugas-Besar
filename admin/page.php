<?php
include "load_info.php";

$pageRoutes = [
    'login' => "page/login.php",
    'register' => "page/register.php",
    'logout' => "page/logout.php",
    'beranda' => "page/cms/beranda.php",
    'tambah-carousel' => "page/cms/tambah-carousel.php",
    'ubah-carousel' => "page/cms/ubah-carousel.php",
    'info-web' => "page/cms/info-web.php",
    'menu' => "page/cms/menu.php",
    'tambah-menu' => "page/cms/tambah-menu.php",
    'ubah-menu' => "page/cms/ubah-menu.php",
    'hapus-menu' => "page/cms/hapus-menu.php",
    'kontak-masuk' => "page/cms/kontak-masuk.php",
    'waktu-operasional' => "page/cms/waktu-operasional.php",
    'banner-teks' => "page/cms/banner-teks.php",
    'tambah-banner-teks' => "page/cms/tambah-banner-teks.php",
    'gallery' => "page/cms/gallery.php",
    'tambah-gallery' => "page/cms/tambah-gallery.php",
    'users' => "page/akun/users.php"
];

$page = $_GET['page'] ?? '';

if (array_key_exists($page, $pageRoutes)) {
    include $pageRoutes[$page];
} else {
    echo "Halaman tidak ditemukan.";
}
