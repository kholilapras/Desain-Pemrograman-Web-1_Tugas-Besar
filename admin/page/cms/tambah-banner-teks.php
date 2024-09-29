<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Super Admin') {
    header('Location: ../index.php');
    exit();
}
include 'page/template/sidebar.php';
?>

<body>
    <main class="content">
        <?php include 'page/template/header.php'; ?>
        <div>
            <h1 class="judul">Tambah Banner Teks</h1>
            <button onclick="window.history.back()"><i class='bx bx-arrow-back'></i> Kembali</button>
            <br>
            <br>
            <form method="post" action="action.php?action=tambah-banner-teks" enctype="multipart/form-data" class="news-form" autocomplete="off">

                <label for="kalimat">Kalimat</label>
                <input type="text" name="kalimat" id="kalimat" placeholder="Maksimal 200 karakter" class="form-input" maxlength="200" required>

                <label for="penjelasan">Penjelasan</label>
                <input type="text" name="penjelasan" id="penjelasan" placeholder="Maksimal 250 karakter" class="form-input" maxlength="250" required>

                <button type="submit" name="submit" class="form-button">Simpan</button>
            </form>

        </div>
    </main>
</body>