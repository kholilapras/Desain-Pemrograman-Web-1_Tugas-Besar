<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kalimat = $_POST['kalimat'];
    $penjelasan = $_POST['penjelasan'];

    $stmt = $koneksi->prepare("INSERT INTO cms_banner_teks (kalimat, penjelasan) VALUES (?, ?)");
    $stmt->bind_param("ss", $kalimat, $penjelasan);

    if ($stmt->execute()) {
        header("Location:page.php?page=banner-teks");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $koneksi->close();
}
