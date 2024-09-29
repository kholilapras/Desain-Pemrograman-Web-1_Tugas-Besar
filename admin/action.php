<?php
include "../config/koneksi.php";

if ($_GET['action'] == 'login') {
    include "action/login.php";
} else if ($_GET['action'] == 'logout') {
    include "action/logout.php";
} else if ($_GET['action'] == 'tambah-menu-kasir') {
    include "action/kasir/tambah-menu-kasir.php";
} else if ($_GET['action'] == 'ubah-menu-kasir') {
    include "action/kasir/ubah-menu-kasir.php";
} else if ($_GET['action'] == 'hapus-menu-kasir') {
    include "action/kasir/hapus-menu-kasir.php";
} else if ($_GET['action'] == 'tambah-carousel') {
    include "action/cms/tambah-carousel.php";
} else if ($_GET['action'] == 'ubah-carousel') {
    include "action/cms/ubah-carousel.php";
} else if ($_GET['action'] == 'hapus-carousel') {
    include "action/cms/hapus-carousel.php";
} else if ($_GET['action'] == 'info-web') {
    include "action/cms/info-web.php";
} else if ($_GET['action'] == 'tambah-menu') {
    include "action/cms/tambah-menu.php";
} else if ($_GET['action'] == 'ubah-menu') {
    include "action/cms/ubah-menu.php";
} else if ($_GET['action'] == 'hapus-menu') {
    include "action/cms/hapus-menu.php";
} else if ($_GET['action'] == 'waktu-operasional') {
    include "action/cms/waktu-operasional.php";
} else if ($_GET['action'] == 'tambah-banner-teks') {
    include "action/cms/tambah-banner-teks.php";
} else if ($_GET['action'] == 'hapus-banner-teks') {
    include "action/cms/hapus-banner-teks.php";
} else if ($_GET['action'] == 'hapus-pesan') {
    include "action/cms/hapus-pesan.php";
} else if ($_GET['action'] == 'tambah-gallery') {
    include "action/cms/tambah-gallery.php";
} else if ($_GET['action'] == 'hapus-gallery') {
    include "action/cms/hapus-gallery.php";
} else if ($_GET['action'] == 'hapus-akun') {
    include "action/cms/hapus-akun.php";
} else if ($_GET['action'] == 'register') {
    include "action/register.php";
}
