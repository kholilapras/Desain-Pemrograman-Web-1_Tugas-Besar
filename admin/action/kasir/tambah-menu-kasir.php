<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['Nama_Menu'];
    $harga = $_POST['Harga'];

    // Validate inputs
    if (!empty($nama_produk) && !empty($harga)) {
        // Insert into database
        $query = "INSERT INTO menu (Nama_Menu, Harga) VALUES ('$nama_produk', '$harga')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "Produk berhasil ditambahkan.";
        } else {
            echo "Gagal menambahkan produk.";
        }
    } else {
        echo "Semua field harus diisi!";
    }
    header("Location: page.php?page=daftar-menu");
} else {
    // If not a POST request, show the form (you can redirect to the form page if needed)
    header("index.php"); // redirect to the form page
    exit();
}
