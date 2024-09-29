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
            <h1 class="judul">Tambah Carousel</h1>
            <button onclick="window.history.back()"><i class='bx bx-arrow-back'></i> Kembali</button>
            <br>
            <br>
            <form method="post" action="action.php?action=tambah-carousel" enctype="multipart/form-data" class="news-form" autocomplete="off">
                <div class="preview" id="preview">
                </div>

                <br>

                <label for="gambar">Upload Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-file" accept=".jpg, .jpeg, .png" required>

                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" placeholder="Maksimal 100 karakter" class="form-input" maxlength="100">

                <label for="subjudul">Subjudul</label>
                <input type="text" name="subjudul" id="subjudul" placeholder="Maksimal 100 karakter" class="form-input" maxlength="100">

                <button type="submit" name="submit" class="form-button">Simpan</button>
            </form>

        </div>
        <script>
            document.getElementById('gambar').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById('preview');
                        preview.innerHTML = '<img src="' + e.target.result + '" alt="Image Preview">';
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
    </main>
</body>