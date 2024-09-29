<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'ubah-menu-kasir') {
    // Ambil nilai dari form POST
    $id = $_POST['id'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];

    // Lakukan koneksi dan query UPDATE
    $query = "UPDATE menu SET nama_menu='$nama_menu', harga='$harga' WHERE menu_id='$id'";
    $result = $koneksi->query($query);

    // Periksa hasil query
    if ($result) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Gagal mengupdate data: " . $koneksi->error;
    }

    // Redirect ke halaman DaftarMenu setelah proses selesai
    header("location: page.php?page=daftar-menu");
    exit; // Penting: pastikan exit setelah header untuk menghentikan eksekusi script
}
