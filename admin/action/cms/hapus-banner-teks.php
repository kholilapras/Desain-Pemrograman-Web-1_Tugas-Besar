<?php
if (isset($_GET['id'])) {
    $banner_id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM cms_banner_teks WHERE banner_id='$banner_id'");
    $data = mysqli_fetch_array($query);
} else {
    header("Location: index.php");
}

if (is_numeric($banner_id)) {
    $stmt = $koneksi->prepare("DELETE FROM cms_banner_teks WHERE banner_id = ?");
    $stmt->bind_param("i", $banner_id);
    $stmt->execute();
    $stmt->close();

    // Redirect setelah berhasil menghapus
    header("location:page.php?page=banner-teks");
    exit();
} else {
    // Tangani kasus di mana banner_id tidak valid
    echo "banner_id tidak valid.";
}
