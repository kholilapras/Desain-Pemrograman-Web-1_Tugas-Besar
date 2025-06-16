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
