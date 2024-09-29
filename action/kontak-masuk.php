<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $pesan = $_POST['pesan'];

    $stmt = $koneksi->prepare("INSERT INTO kontak_masuk (nama, email, telp, pesan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $telp, $pesan);

    if ($stmt->execute()) {
        header("Location:page.php?page=kontak");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $koneksi->close();
}
