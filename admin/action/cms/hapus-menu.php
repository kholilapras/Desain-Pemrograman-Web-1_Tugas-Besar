<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah id adalah angka
    if (!is_numeric($id)) {
        echo "ID bukan angka valid.<br>";
        header("Location:page.php?page=beranda");
        exit();
    }

    // Ambil data dari database berdasarkan id
    $query = mysqli_query($koneksi, "SELECT * FROM cms_menu WHERE id='$id'");
    if ($query) {
        $data = mysqli_fetch_array($query);

        if ($data) {
            $filePath = '' . $data['gambar']; // Ganti 'gambar' dengan nama kolom yang menyimpan nama file gambar
            echo "Path file: " . $filePath . "<br>";

            // Cek apakah file ada
            if (file_exists($filePath)) {
                echo "File ditemukan.<br>";
                // Hapus file gambar dari server
                if (unlink($filePath)) {
                    echo "File berhasil dihapus.<br>";
                    // Hapus data dari database
                    $stmt = $koneksi->prepare("DELETE FROM cms_menu WHERE id = ?");
                    if ($stmt) {
                        $stmt->bind_param("i", $id);
                        if ($stmt->execute()) {
                            echo "Data berhasil dihapus dari database.<br>";
                        } else {
                            echo "Error executing statement: " . $stmt->error . "<br>";
                        }
                        $stmt->close();

                        header("Location:page.php?page=menu");
                        exit();
                    } else {
                        echo "Error preparing statement: " . $koneksi->error . "<br>";
                    }
                } else {
                    echo "Error deleting file: " . $filePath . "<br>";
                }
            } else {
                echo "File tidak ditemukan: " . $filePath . "<br>";
            }
        } else {
            echo "Data tidak ditemukan untuk ID: " . $id . "<br>";
            header("Location:page.php?page=menu");
            exit();
        }
    } else {
        echo "Error executing query: " . mysqli_error($koneksi) . "<br>";
    }
} else {
    echo "ID tidak di-set.<br>";
    header("Location: index.php");
    exit();
}
