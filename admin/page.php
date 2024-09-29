<?php
include "../config/koneksi.php";

$sql = "SELECT * FROM info_web";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_info = $row['id_info'];
    $nama_website = $row['nama_website'];
    $whatsapp = $row['whatsapp'];
    $whatsapp_link = $row['whatsapp_link'];
    $facebook = $row['facebook'];
    $instagram = $row['instagram'];
    $alamat = $row['alamat'];
    $gmaps = $row['gmaps'];
    $gofood = $row['gofood'];
    $shopeefood = $row['shopeefood'];
    $grabfood = $row['grabfood'];
    $sejarah = $row['sejarah'];
}

if ($_GET['page'] == 'login') {
    include "page/login.php";
} else if ($_GET['page'] == 'register') {
    include "page/register.php";
} else if ($_GET['page'] == 'logout') {
    include "page/logout.php";
} else if ($_GET['page'] == 'beranda') {
    include "page/cms/beranda.php";
} else if ($_GET['page'] == 'transaksi') {
    include "page/kasir/transaksi.php";
} else if ($_GET['page'] == 'daftar-menu') {
    include "page/kasir/daftar-menu.php";
} else if ($_GET['page'] == 'tambah-menu-kasir') {
    include "page/kasir/tambah-menu-kasir.php";
} else if ($_GET['page'] == 'ubah-menu-kasir') {
    include "page/kasir/ubah-menu-kasir.php";
} else if ($_GET['page'] == 'tambah-carousel') {
    include "page/cms/tambah-carousel.php";
} else if ($_GET['page'] == 'ubah-carousel') {
    include "page/cms/ubah-carousel.php";
} else if ($_GET['page'] == 'info-web') {
    include "page/cms/info-web.php";
} else if ($_GET['page'] == 'menu') {
    include "page/cms/menu.php";
} else if ($_GET['page'] == 'tambah-menu') {
    include "page/cms/tambah-menu.php";
} else if ($_GET['page'] == 'ubah-menu') {
    include "page/cms/ubah-menu.php";
} else if ($_GET['page'] == 'hapus-menu') {
    include "page/cms/hapus-menu.php";
} else if ($_GET['page'] == 'kontak-masuk') {
    include "page/cms/kontak-masuk.php";
} else if ($_GET['page'] == 'waktu-operasional') {
    include "page/cms/waktu-operasional.php";
} else if ($_GET['page'] == 'laporan') {
    include "page/kasir/laporan.php";
} else if ($_GET['page'] == 'banner-teks') {
    include "page/cms/banner-teks.php";
} else if ($_GET['page'] == 'tambah-banner-teks') {
    include "page/cms/tambah-banner-teks.php";
} else if ($_GET['page'] == 'gallery') {
    include "page/cms/gallery.php";
} else if ($_GET['page'] == 'tambah-gallery') {
    include "page/cms/tambah-gallery.php";
} else if ($_GET['page'] == 'users') {
    include "page/akun/users.php";
}
