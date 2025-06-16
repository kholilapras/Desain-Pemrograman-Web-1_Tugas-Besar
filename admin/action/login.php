<?php
session_start();

// Periksa apakah koneksi ke database berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Periksa apakah metode permintaan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah tombol submit ditekan
    if (isset($_POST['submit'])) {
        // Amankan input pengguna untuk menghindari SQL Injection
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);

        // Query untuk mengambil data pengguna berdasarkan email
        $sql = "SELECT id, nama_lengkap, no_telp, email, role, password, created_at FROM akun WHERE email = ?";
        $stmt = mysqli_stmt_init($koneksi);

        // Persiapkan statement SQL
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            // Periksa apakah ada pengguna dengan email tersebut
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $nama_lengkap, $no_telp, $email, $role, $hashed_password, $created_at);
                mysqli_stmt_fetch($stmt);

                // Verifikasi password
                if (password_verify($password, $hashed_password)) {
                    // Jika password benar, set session dan redirect
                    $_SESSION['user_id'] = $id;
                    $_SESSION['nama_lengkap'] = $nama_lengkap;
                    $_SESSION['no_telp'] = $no_telp;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $role;

                    header("Location: page.php?page=beranda");
                    exit();
                } else {
                    // Jika password salah
                    echo '<p style="text-align: center; color:var(--white)">Email atau password salah.</p>';
                }
            } else {
                // Jika email tidak ditemukan
                echo '<p style="text-align: center; color:var(--white)">Email atau password salah.</p>';
            }

            mysqli_stmt_close($stmt);
        } else {
            // Jika terjadi kesalahan dalam persiapan statement
            error_log("Error preparing statement: " . mysqli_error($koneksi));
            echo '<p style="text-align: center; color:var(--white)">Terjadi kesalahan. Silakan coba lagi.</p>';
        }
    } else {
        echo '<p style="text-align: center; color:var(--white)">Metode permintaan tidak valid.</p>';
    }
}

mysqli_close($koneksi);
