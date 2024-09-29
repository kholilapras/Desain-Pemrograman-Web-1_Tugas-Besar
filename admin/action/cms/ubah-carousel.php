<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'ubah-carousel') {

    // Mendapatkan data dari formulir
    $judul = $koneksi->real_escape_string($_POST['judul']);
    $subjudul = $koneksi->real_escape_string($_POST['subjudul']);
    $id = $_POST['id'];  // Pastikan formulir menyertakan ID data yang akan diperbarui

    // Proses upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "uploads/carousel/";
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
                        $sql = "UPDATE cms_beranda_carousel SET judul=?, subjudul=?, gambar=? WHERE id=?";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->bind_param("sssi", $judul, $subjudul, $target_file, $id);

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
        $sql = "UPDATE cms_beranda_carousel SET judul=?, subjudul=? WHERE id=?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssi", $judul, $subjudul, $id);

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
    header("Location: page.php?page=beranda");
    exit(); // Pastikan untuk menghentikan eksekusi skrip setelah header redirect
}
