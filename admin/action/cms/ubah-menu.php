<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'ubah-menu') {

    // Mendapatkan data dari formulir
    $nama_menu = $koneksi->real_escape_string($_POST['nama_menu']);
    $detail = $koneksi->real_escape_string($_POST['detail']);
    $harga = $koneksi->real_escape_string($_POST['harga']);
    $id = $_POST['id'];  // Pastikan formulir menyertakan ID data yang akan diperbarui

    // Proses upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "uploads/menu/";
        $imageFileType = strtolower(pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION));

        // Memeriksa apakah file gambar adalah gambar asli atau gambar palsu
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            // Memeriksa ukuran file (di sini dibatasi 5MB)
            if ($_FILES["gambar"]["size"] <= 5000000) {
                // Hanya memperbolehkan format tertentu
                if ($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png") {
                    // Tentukan nama file baru menggunakan ID
                    $new_filename = $id . "." . $imageFileType;
                    $target_file = $target_dir . $new_filename;

                    // Pindahkan file ke direktori tujuan dengan nama baru
                    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                        // Update data di database
                        $sql = "UPDATE cms_menu SET nama_menu=?, detail=?, harga=?, gambar=? WHERE id=?";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->bind_param("ssssi", $nama_menu, $detail, $harga, $target_file, $id);

                        // Eksekusi pernyataan update
                        if ($stmt->execute()) {
                            echo "Data berhasil diperbarui.";
                        } else {
                            echo "Error updating record: " . $koneksi->error;
                        }

                        // Tutup pernyataan
                        $stmt->close();
                    } else {
                        echo "Maaf, ada kesalahan saat mengunggah file Anda.";
                    }
                } else {
                    echo "Maaf, hanya file JPG, JPEG, & PNG yang diperbolehkan.";
                }
            } else {
                echo "Maaf, file Anda terlalu besar.";
            }
        } else {
            echo "File bukan gambar.";
        }
    } else {
        // Update data tanpa gambar jika tidak ada file yang diunggah
        $sql = "UPDATE cms_menu SET nama_menu=?, detail=?, harga=? WHERE id=?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $nama_menu, $detail, $harga, $id);

        // Eksekusi pernyataan update
        if ($stmt->execute()) {
            echo "Data berhasil diperbarui.";
        } else {
            echo "Error updating record: " . $koneksi->error;
        }

        // Tutup pernyataan
        $stmt->close();
    }

    // Tutup koneksi
    $koneksi->close();

    // Redirect ke halaman lain setelah berhasil menyimpan data
    header("Location: page.php?page=menu");
    exit(); // Pastikan untuk menghentikan eksekusi skrip setelah header redirect
}
