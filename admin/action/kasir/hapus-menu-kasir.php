<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $koneksi->prepare("SELECT * FROM menu WHERE menu_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();

    if ($data) {
        $stmt = $koneksi->prepare("DELETE FROM menu WHERE menu_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header("Location: page.php?page=daftar-menu");
        exit();
    } else {
        header("Location: page.php?page=daftar-menu");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
