<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'tambah-carousel') {
    // Dapatkan data dari form
    $judul = $_POST['judul'];
    $subjudul = $_POST['subjudul'];

    // Proses upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "uploads/carousel/"; // Direktori untuk menyimpan file yang diunggah
        $imageFileType = strtolower(pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION));

        // Cek apakah file adalah gambar
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            // Cek ukuran file (misalnya, maksimal 5MB)
            if ($_FILES["gambar"]["size"] <= 5000000) {
                // Hanya izinkan format tertentu
                if ($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png") {
                    // Siapkan pernyataan SQL untuk menyimpan data ke database tanpa gambar
                    $sql = "INSERT INTO cms_beranda_carousel (judul, subjudul) VALUES (?, ?)";
                    $stmt = $koneksi->prepare($sql);
                    $stmt->bind_param("ss", $judul, $subjudul);

                    // Eksekusi pernyataan
                    if ($stmt->execute()) {
                        // Dapatkan ID dari entri yang baru dibuat
                        $last_id = $stmt->insert_id;

                        // Tentukan nama file baru menggunakan ID
                        $new_filename = $last_id . "." . $imageFileType;
                        $target_file = $target_dir . $new_filename;

                        // Pindahkan file ke direktori tujuan dengan nama baru
                        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                            // Update entri dengan nama file gambar
                            $update_sql = "UPDATE cms_beranda_carousel SET gambar = ? WHERE id = ?";
                            $update_stmt = $koneksi->prepare($update_sql);
                            $update_stmt->bind_param("si", $target_file, $last_id);

                            // Eksekusi pernyataan update
                            if ($update_stmt->execute()) {
                                // Tutup pernyataan dan koneksi
                                $update_stmt->close();
                                $stmt->close();
                                $koneksi->close();

                                // Redirect ke halaman lain setelah berhasil menyimpan data
                                header("Location: page.php?page=beranda"); // Ganti dengan halaman yang Anda inginkan
                                exit(); // Pastikan untuk menghentikan eksekusi skrip setelah header redirect
                            } else {
                                echo "Error: " . $update_sql . "<br>" . $koneksi->error;
                            }
                        } else {
                            echo "Terjadi kesalahan saat mengunggah file.";
                        }
                    } else {
                        echo "Error: " . $sql . "<br>" . $koneksi->error;
                    }
                } else {
                    echo "Hanya format JPG, JPEG, dan PNG yang diperbolehkan.";
                }
            } else {
                echo "File terlalu besar.";
            }
        } else {
            echo "File bukan gambar.";
        }
    } else {
        echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
    }

    // Tutup koneksi jika belum ditutup
    if ($koneksi) {
        $koneksi->close();
    }
}
