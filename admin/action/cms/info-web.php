<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'info-web') {
    // Pastikan koneksi database sudah diinisialisasi
    include 'koneksi.php'; // Pastikan file ini mengandung koneksi ke database

    // Ambil data dari form
    $id_info = $_POST['id_info'];
    $nama_website = $_POST['nama_website'];
    $whatsapp = $_POST['whatsapp'];
    $whatsapp_link = $_POST['whatsapp_link'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $alamat = $_POST['alamat'];
    $gmaps = $_POST['gmaps'];
    $shopeefood = $_POST['shopeefood'];
    $grabfood = $_POST['grabfood'];
    $gofood = $_POST['gofood'];
    $sejarah = $_POST['sejarah'];

    // Buat query untuk update data
    $sql = "UPDATE info_web SET 
                nama_website = ?, 
                whatsapp = ?, 
                whatsapp_link = ?, 
                facebook = ?, 
                instagram = ?, 
                alamat = ?, 
                gmaps = ?, 
                shopeefood = ?,
                grabfood = ?,
                gofood = ?,
                sejarah = ?
            WHERE id_info = ?";

    // Siapkan statement
    $stmt = $koneksi->prepare($sql);

    // Periksa apakah statement berhasil disiapkan
    if ($stmt === false) {
        die("Kesalahan dalam menyiapkan pernyataan: " . $koneksi->error);
    }

    // Bind parameter ke statement
    $stmt->bind_param('sssssssssssi', $nama_website, $whatsapp, $whatsapp_link, $facebook, $instagram, $alamat, $gmaps, $shopeefood, $grabfood, $gofood, $sejarah, $id_info);

    // Eksekusi statement
    if ($stmt->execute()) {
        header("Location: page.php?page=info-web");
        exit();
    } else {
        echo "Kesalahan dalam memperbarui data: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $koneksi->close();
}
