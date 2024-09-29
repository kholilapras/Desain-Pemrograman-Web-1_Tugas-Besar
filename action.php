<?php
include "config/koneksi.php";

if ($_GET['action'] == 'kontak-masuk') {
    include "action/kontak-masuk.php";
}