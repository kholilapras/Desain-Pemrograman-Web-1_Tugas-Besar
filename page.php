<?php include "load_info.php";

$page_map = [
    'beranda' => 'page/beranda.php',
    'menu'    => 'page/menu.php',
    'kontak'  => 'page/kontak.php',
    'tentang' => 'page/tentang.php'
];

$page = $_GET['page'] ?? 'beranda';

if (array_key_exists($page, $page_map)) {
    include $page_map[$page];
} else {
    include 'page/beranda.php';
}
