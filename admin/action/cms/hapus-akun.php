<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM akun WHERE id='$id'");
    $data = mysqli_fetch_array($query);
} else {
    header("Location: index.php");
}

if (is_numeric($id)) {
    $stmt = $koneksi->prepare("DELETE FROM akun WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Redirect setelah berhasil menghapus
    header("location:page.php?page=users");
    exit();
} else {
    // Tangani kasus di mana id tidak valid
    echo "ID tidak valid.";
}
